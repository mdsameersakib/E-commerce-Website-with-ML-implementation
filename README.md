# Modernized E-Commerce Platform (Zero-Install Architecture)

A secure, high-performance, and modernized university e-commerce website. Refactored from legacy PHP/MySQL to a robust, zero-dependency modern stack using native PHP features, PDO prepared statements, and collaborative filtering recommendations implemented directly in MySQL/MariaDB SQL queries.

---

## Architecture Overview

This project is designed to run out-of-the-box on a standard PHP and MySQL/MariaDB environment. It has **zero external package dependencies** (no Composer, no Node.js, no external Python execution).

| Component | Legacy | Modernized (Zero-Install) | Benefit |
|---|---|---|---|
| **Database Access** | Raw `mysqli` + string concatenation | **PDO + Prepared Statements** | Eliminates SQL Injection (SQLi) |
| **Authentication** | Plaintext password matching | **Native Bcrypt Hashing** | Secure password storage (`password_hash`/`password_verify`) |
| **Session Management** | Unsecured native `session_start()` | **Hardened Sessions** | Mitigates Session Hijacking and Fixation |
| **Recommendation Engine** | Slow, external Python script + file I/O | **Pure SQL Collaborative Filtering** | Real-time, concurrent-safe, zero dependency |
| **User Interface** | Custom styling, inconsistent layouts | **Tailwind CSS & DaisyUI (CDN)** | Clean light theme, premium interactive UX |
| **Refund Uploads** | Unrestricted file uploads | **MIME-verified, UUID-renamed uploads** | Prevents remote code execution (RCE) |

---

## 1. Security Hardening & Implementation

### Database Security (PDO Prepared Statements)
All queries throughout the customer, employee, and admin portals use PHP Data Objects (PDO) with prepared statements. Parameter binding ensures user inputs are never parsed directly as SQL execution commands:

```php
$stmt = $conn->prepare("SELECT * FROM product WHERE category = :category");
$stmt->execute(['category' => $category]);
$products = $stmt->fetchAll();
```

### Password Protection (Bcrypt Hashing)
Passwords are saved using PHP's native `PASSWORD_BCRYPT` algorithm. During database migration, all legacy plaintext entries in the database dump were updated to secure hashes using a pure-python bcrypt generator.
* **Registration:** Uses `password_hash($password, PASSWORD_BCRYPT)` which automatically generates a secure cryptographically random salt.
* **Authentication:** Validated via `password_verify($password_input, $stored_hash)` to protect against timing attacks.

### Session Hardening
To protect user sessions from interception and manipulation, native sessions are configured with strict cookie flags inside `includes/config.php`:
* `session.cookie_httponly = 1`: Prevents JavaScript from reading the session cookie (stops XSS from stealing sessions).
* `session.cookie_samesite = 'Strict'`: Mitigates Cross-Site Request Forgery (CSRF).
* `session.use_only_cookies = 1`: Prevents session ID passing in URLs.
* `session_regenerate_id(true)` is called immediately upon successful authentication to destroy the old session ID (mitigates Session Fixation).

### Safe File Uploads (Refund receipts)
To prevent malicious file uploads (e.g., PHP web shells), the refund receipt upload pipeline enforces multi-layered checks:
1. **Size Verification:** Files are strictly capped at 2MB.
2. **MIME Validation:** Reads the file bytes via PHP `finfo` rather than trusting the user-supplied extension:
   ```php
   $finfo = new finfo(FILEINFO_MIME_TYPE);
   $mime = $finfo->file($_FILES['refund_image']['tmp_name']);
   ```
3. **Randomized Renaming:** Uploaded files are renamed using a secure 128-bit UUID to prevent directory traversal attacks or file overwrites.
4. **Access Prevention:** The uploads directory stores files as un-executable media assets.

---

## 2. SQL Recommendation Engine

To avoid external Python runtimes, dependencies, or file-system race conditions, the recommendation engine was rebuilt as a native SQL query executing directly on the database.

### 2.1 Content-Based Recommendations (Product Page)
Finds products in the same category, prioritizing those with higher ratings and stock availability:
```sql
SELECT * FROM product 
WHERE category = :category AND product_id != :product_id 
ORDER BY rating DESC, stock DESC 
LIMIT 6
```

### 2.2 Collaborative Filtering ("Customers Also Liked/Carted")
Matches products based on shared customer interactions. If customer A and customer B both have Product X in their cart or wishlist, the query recommends other items that A and B have interacted with to other users looking at Product X:

```sql
SELECT p.*, COUNT(*) as co_occurrence
FROM (
    SELECT customer_id FROM wishlist WHERE product_id = :pid
    UNION
    SELECT customer_id FROM adds WHERE product_id = :pid
) as users_with_this_item
JOIN (
    SELECT customer_id, product_id FROM wishlist WHERE product_id != :pid
    UNION
    SELECT customer_id, product_id FROM adds WHERE product_id != :pid
) as other_items ON users_with_this_item.customer_id = other_items.customer_id
JOIN product p ON other_items.product_id = p.product_id
GROUP BY p.product_id
ORDER BY co_occurrence DESC, p.rating DESC
LIMIT 6
```

#### How it works:
1. **`users_with_this_item`**: Extracts all `customer_id`s that have the current product (`:pid`) in either their `wishlist` or `adds` (cart).
2. **`other_items`**: Finds all other product interactions (`product_id != :pid`) from *any* user.
3. **`JOIN`**: Intersects these on `customer_id` to discover what *other* products the buyers of `:pid` also interacted with.
4. **`GROUP BY` & `COUNT(*)`**: Calculates a co-occurrence score (how many customers shared this behavior).
5. **`ORDER BY`**: Ranks the output by co-occurrence score (highest similarity first), breaking ties with overall product ratings.

---

## 3. UI Design System
The frontend has been entirely redesigned using Tailwind CSS and DaisyUI, featuring:
* A modern, premium Light Theme layout (fully removing dark theme and gradients).
* Responsive grids for product catalogs.
* Interactive feedback (hover transitions, active states, and beautiful micro-animations).
* Standardized component-based includes (`header.php` and `footer.php`) to unify the navigation and visual system.

---

## 4. Test Credentials

To test the application's features, you can log in using the following test accounts:

### Customer Portal
* **User ID:** `00001`
* **Password:** `Welcome.`
* **Name:** `Md. Sameer Sakib`

### Staff / Employee Portal
* **User ID:** `000002`
* **Password:** `Password123!`

