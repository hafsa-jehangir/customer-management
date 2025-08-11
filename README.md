# Customer Management System

A simple **PHP** and **MySQL**-based web application to add, edit, display, and delete customer records.  
It provides user authentication (login/registration), profile management, and the ability to upload and display profile pictures.

## Features
- User registration and login (session-based authentication).
- Add new customer records with details such as:
  - Name, Email, Phone, Address
  - Profile Picture
- Edit existing customer records with the ability to update all fields and change the profile picture.
- Delete customer records from the database.
- View all customers in a tabular format with their details and pictures.
- Responsive and clean UI with simple CSS styling.

## Technologies Used
- **Backend:** PHP (server-side scripting)
- **Database:** MySQL
- **Frontend:** HTML, CSS
- **Icons:** Font Awesome

## Installation
1. Clone the repository or download the source code.
2. Set up a local or remote server with PHP and MySQL (e.g., **XAMPP**, **WAMP**).
3. Create a MySQL database named `customer`.
4. Import the `customer.sql` file into your database using **phpMyAdmin**.
5. Place the project files inside your server's root directory (`htdocs` or `www`).
6. Ensure an `img` folder exists inside the project directory for storing customer profile images.
7. Access the project via your browser.
## Usage
- Use the **Register** page to create a new account.
- Login to access the dashboard and manage customers.
- Add new customers, edit details, or delete records as needed.
- Uploaded profile pictures will be stored in the `img` folder.

## Notes
- Ensure proper folder permissions to allow file uploads.
- This project is for **learning and small-scale usage**.
## License
This project is open-source and free to use.
