**TITLE: Laravel E-Commerce Application (Full Project Prompt)**

Create a complete **E-commerce Web Application using Laravel (latest version)** with MySQL database and modern UI using Bootstrap.

---

### 🔐 Authentication

* User Registration
* User Login / Logout
* Password Reset (optional)
* Role-based access:

  * Admin
  * User

---

### 🛍️ Product Management

* Product CRUD (Create, Read, Update, Delete)
* Fields:

  * Product Name
  * Description
  * Price
  * Discount Price (optional)
  * Stock Quantity
  * Product Image (upload)
  * Category
  * Subcategory
* Image upload & storage (public folder / storage link)

---

### 📂 Category & Subcategory

* Category CRUD
* Subcategory linked with category
* Show products based on:

  * Category
  * Subcategory

---

### 🛒 Cart System

* Add to Cart
* Remove from Cart
* Update Quantity
* Session-based cart (for guest)
* Database cart (for logged-in users)

---

### 💳 Checkout System

* Checkout Page:

  * User Details (name, address, phone)
  * Order Summary
* Place Order
* Payment method:

  * Cash on Delivery (COD)

---

### 📦 Order Management

* Store Orders in database
* Order fields:

  * User ID
  * Total Price
  * Status (Pending, Processing, Completed)
* User:

  * View their orders
* Admin:

  * View all orders
  * Update order status

---

### 🛠️ Admin Panel

(Admin middleware protection)

* Dashboard
* Manage Categories
* Manage Subcategories
* Manage Products
* Manage Orders
* Manage Users (optional)

---

### 🖼️ Image Upload

* Use Laravel file upload
* Store images in:

  * storage/app/public
* Run:
  php artisan storage:link

---

### 🗄️ Database (MySQL)

Create migrations for:

* users
* categories
* subcategories
* products
* carts
* orders
* order_items

---

### 🎨 Frontend Design

* Use:

  * Bootstrap 5
  * HTML5
  * CSS3
* Pages:

  * Home Page
  * Product Listing Page
  * Product Detail Page
  * Cart Page
  * Checkout Page
  * Login/Register Page
* Clean & responsive UI
* Navbar with:

  * Categories dropdown
  * Cart icon
  * Login/Register

---

### ⚙️ Backend Structure

* MVC Pattern
* Controllers:

  * AuthController
  * ProductController
  * CategoryController
  * CartController
  * OrderController
  * AdminController
* Use:

  * Eloquent ORM
  * Validation
  * Middleware

---

### 🔒 Security

* CSRF Protection
* Form validation
* Authentication middleware

---

### 🚀 Extra Features (Optional but Recommended)

* Product search
* Pagination
* Flash messages (success/error)
* Wishlist
* AJAX add to cart

---

### 📁 Output Requirement

* Complete Laravel project
* Clean folder structure
* Well-commented code
* Ready to run:
  composer install
  php artisan migrate
  php artisan serve

---

### 🎯 Goal

Build a **fully functional, professional-level E-commerce Laravel application** suitable for real-world use and portfolio projects.

---

**END OF PROMPT**
