import pymysql
from surprise import Dataset, Reader, SVD
from surprise.model_selection import train_test_split
import sys
import json

# Connect to MySQL database
connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             database='online_shop')

# Fetch wishlist and orders data from MySQL
cursor = connection.cursor()

# Fetch wishlist data
cursor.execute("SELECT customer_id, product_id FROM wishlist")
wishlist_data = cursor.fetchall()

# Fetch orders data
cursor.execute("SELECT customer_id, product_id FROM adds")
orders_data = cursor.fetchall()

# Close database connection
connection.close()

# Prepare data for Surprise library
data = []
reader = Reader(rating_scale=(0, 1))  # Since we only need user-item interactions
for customer_id, product_id in wishlist_data + orders_data:
    data.append((str(customer_id), str(product_id), 1))  # 1 indicates interaction

# Load data into Surprise Dataset
dataset = Dataset.load_from_df(data, reader)

# Split dataset into train and test sets
trainset, testset = train_test_split(dataset, test_size=0.2)

# Train the model
model = SVD()
model.fit(trainset)

# Generate recommendations for a specific user
def generate_recommendations(customer_id, model, n=10):
    # Fetch products the user has not interacted with
    connection = pymysql.connect(host='localhost',
                                 user='root',
                                 password='',
                                 database='online_shop')
    cursor = connection.cursor()
    cursor.execute("SELECT product_id FROM products WHERE product_id NOT IN "
                   "(SELECT product_id FROM wishlist WHERE customer_id=%s UNION "
                   "SELECT product_id FROM adds WHERE customer_id=%s)", (customer_id, customer_id))
    products_to_predict = [str(row[0]) for row in cursor.fetchall()]
    connection.close()

    # Predict ratings for the products
    predictions = [model.predict(customer_id, product_id) for product_id in products_to_predict]

    # Sort predictions by estimated rating
    top_n = sorted(predictions, key=lambda x: x.est, reverse=True)[:n]

    # Return the top recommendations
    recommendations = []
    for pred in top_n:
        recommendations.append({
            'product_id': pred.iid,
            'estimated_rating': pred.est
            # You can fetch other product details and add them to the recommendations as needed
        })
    return recommendations

# Retrieve customer ID from command-line argument
customer_id = sys.argv[1]

# Generate recommendations for the user
recommendations = generate_recommendations(customer_id, model)

# Print recommendations as JSON
print(json.dumps(recommendations))
