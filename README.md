# UrbanEstate – Real Estate Management Website

UrbanEstate is a responsive real estate website that allows users to browse properties for sale or rent, register and log in, contact the platform, subscribe to newsletters, and explore detailed property listings.

## Features

### User Authentication
- User Registration
- User Login
- Session Management
- Logout Functionality

### Property Listings
- Properties Available for Purchase
- Properties Available for Rent
- Detailed Property Information Pages
- Property Images and Descriptions

### Website Pages
- Home Page
- About Us
- Contact Us
- Login & Registration
- Property Listings
- Purchase Section
- Rental Section

### Additional Features
- Newsletter Subscription
- Contact Form Submission
- Responsive Navigation Menu
- User Session-Based Access Control

---

## Technologies Used

### Frontend
- HTML5
- CSS3
- JavaScript
- Boxicons

### Backend
- PHP

### Database
- MySQL

---

## Project Structure

```text
Urban_Estate Website/
│
├── index.html
├── aboutus.html
├── contactus.html
├── login.html
├── signup.html
├── purchase.html
├── rent.html
│
├── property1.html
├── property2.html
├── property3.html
├── property4.html
├── property5.html
├── property6.html
├── property7.html
│
├── property1rent.html
├── property2rent.html
├── property3rent.html
├── property4rent.html
├── property5rent.html
├── property6rent.html
├── property7rent.html
│
├── login.php
├── logout.php
├── secret.php
├── report.php
├── contreport.php
├── newsletter.php
├── paypal.php
│
├── style.css
├── loginstyle.css
├── propsheet.css
├── newslet.js
│
└── ProjectOutput/
    └── Output Screens/
```

---

## Database Configuration

The project uses a MySQL database named:

```sql
urbanestate
```

Update the database connection settings in PHP files if required:

```php
$connection = mysqli_connect(
    "localhost",
    "root",
    "",
    "urbanestate"
);
```

---

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/1MdAnas1/urbanEstate-app.git
cd urbanEstate-app
```

### 2. Setup Local Server

Install one of the following:

- XAMPP
- WAMP
- Laragon

### 3. Move Project

Copy the `Urban_Estate Website` folder into:

```text
xampp/htdocs/
```

### 4. Start Services

Start:

- Apache
- MySQL

from the XAMPP Control Panel.

### 5. Create Database

Open:

```text
http://localhost/phpmyadmin
```

Create a database:

```sql
urbanestate
```

Import the required tables.

### 6. Run Project

Open:

```text
http://localhost/Urban_Estate Website
```

---

## Screenshots

The repository contains screenshots demonstrating:

- Home Page
- Login System
- Registration System
- Property Listings
- Rental Properties
- Purchase Properties
- Contact Form
- Newsletter Module

Located in:

```text
ProjectOutput/Output Screens/
```

---

## Learning Outcomes

This project demonstrates:

- PHP Web Development
- MySQL Database Integration
- Session Handling
- User Authentication
- Frontend Design with HTML/CSS
- Form Handling
- Responsive Website Development

---


## Author

**Mohd Anas Siddique**

---

## License

This project is licensed under the MIT License.
