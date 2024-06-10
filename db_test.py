# Module Imports
import mariadb 
import sys

import os


#importing libraries

import numpy as np 
import pandas as pd
import matplotlib.pyplot as plt 

# %matplotlib inline
plt.style.use("ggplot")

import sklearn
from sklearn.decomposition import TruncatedSVD


# Importing libraries

from sklearn.feature_extraction.text import TfidfVectorizer, CountVectorizer
from sklearn.neighbors import NearestNeighbors
from sklearn.cluster import KMeans
from sklearn.metrics import adjusted_rand_score

# Connect to MariaDB Platform
try:
    conn = mariadb.connect(
        user="root", password="", host="127.0.0.1", port=3306, database="online_shop" #need to send this to Naveed to change
    )
except mariadb.Error as e:
    print(f"Error connecting to MariaDB Platform: {e}")
    sys.exit(1)

# Get Cursor
cur = conn.cursor()

cur.execute("SELECT * FROM product")


prod_list = []
for row in cur:
    product_data, product_img = row[:8], row[8]
    prod_list.append(product_data)



prod_df = pd.DataFrame(
    prod_list,
    columns=[
        "product_id",
        "name",
        "price",
        "category",
        "rating",
        "review",
        "wid",
        "stock",
    ],
)

#print(prod_df.shape)
#print(prod_df.head())

prod_df_1 = prod_df

#converting the text in product description into numerical data for analysis
vectorizer = TfidfVectorizer(stop_words = "english")
X1 = vectorizer.fit_transform(prod_df_1["review"])
#print(X1)

#visualizing product clusters in subset of data
#fitting k-menas to the dataset
X = X1

kmeans = KMeans(n_clusters = 10, init = "k-means++")
y_kmeans = kmeans.fit_predict(X)
#plt.plot(y_kmeans, ".")
#plt.show()

#function
# def print_cluster(i):
#     print(f"Cluster {i}:")
#     for ind in order_centroids[i, :10]:
#         print(f' {terms[ind]}')

#top words in each cluster based on product description
##optimal cluster is
true_k = 10

model = KMeans(n_clusters = true_k, init = "k-means++", max_iter = 100, n_init = 1)
model.fit(X1)

#print("Top terms per cluster: ")
order_centroids = model.cluster_centers_.argsort()[:, : : -1]
terms = vectorizer.get_feature_names_out()
#for i in range(true_k):
#   print_cluster(i)


# #function
# def show_recommendations(product):
#     #print("Cluster ID: ")
#     Y = vectorizer.transform([product])
#     prediction = model.predict(Y)
#     #print(prediction)
#     print_cluster(prediction[0])

def show_recommendations(product):
    # Transform the user's input using the vectorizer
    Y = vectorizer.transform([product])
    # Predict the cluster for the user's input
    prediction = model.predict(Y)
    # Get the cluster ID
    cluster_id = prediction[0]

    # Create a DataFrame for products in the identified cluster
    cluster_products = prod_df[prod_df['review'].apply(lambda review: model.predict(vectorizer.transform([review]))[0]) == cluster_id]
    
    # Get the product names from the DataFrame
    product_names = cluster_products['name'].tolist()
    
    # Print the cluster ID and the product names
    # print(f"Cluster ID: {cluster_id}")
    # print("Recommended Products:")
    # for name in product_names:
    #     print(name)
    
    # Return the list of product names
    return product_names

# Example usage:

# print(recommended_products)
# Define the path to the file
filename = "X:/xamp/htdocs/product_name.txt"

# Read the product name from the file
with open(filename, "r") as file:
    product_name = file.read().strip()

if product_name:
    print("Product Name:", product_name)
else:
    print("Error: Product name not provided.")
result_array = show_recommendations(product_name)

# Write the result array to a file
filename = "X:/xamp/htdocs/result_array.txt"
with open(filename, "w") as file:
    for item in result_array:
        file.write("%s\n" % item)













#for pid, pname, pcat, preview in zip(prod_df['product_id'], prod_df#['name'], prod_df['category'], prod_df['review']):
#prod_descs = []
#    desc = generate_description(pname, preview, pcat)
#    prod_descs.append((pid, desc))
#    print(pname, pcat, preview, desc)
#    time.sleep(60)


#with open("prod_descriptions", "wb") as f:
#    pickle.dump(prod_descs, f)
