# Online Voting System

The **Online Voting System** is a web application that allows users to securely register, log in, and cast their votes online. This system includes email verification for registration and password reset functionality, ensuring a secure voting process. Users can view the voting options on the "Vote Now" page and participate in elections.

## Features

- **User Registration**: Users can sign up by providing necessary details and verifying their email.
- **Email Verification**: A verification link is sent to the user's email upon registration to confirm their account.
- **Login**: Registered users can log in using their credentials.
- **Forgot Password**: Users can reset their password by receiving a password reset link sent to their registered email.
- **Vote Now**: Users can navigate to the "Vote Now" section to participate in elections.
- **Contact Page**: A page where users can contact for further assistance or inquiries.
- **Logout**: Users can log out of their accounts.

### Additional Features:

- **Email Notifications**:
  - **Password Reset**: Users receive an email with a reset link if their email is valid.
  - **Email Verification**: New users receive an email to verify their email address upon registration.

## Technologies Used

- **Frontend**:
  - HTML
  - CSS
  - JavaScript
- **Backend**:
  - PHP
- **Database**:
  - MySQL
- **Other**:
  - Email handling (for user verification and password reset)

## How It Works

1. **User Registration**:
   - When a user registers, they provide their details (name, email, password, etc.).
   - A verification email with a link is sent to the user's email address for confirmation.

2. **Email Verification**:
   - After registration, the user must click the verification link sent to their email to activate their account.
   - Once verified, the user can log in using their credentials.

3. **Login**:
   - Registered users can log in using their email and password.

4. **Forgot Password**:
   - If a user forgets their password, they can request a password reset by entering their email address.
   - A reset link will be sent to their email, allowing them to create a new password.

5. **Vote Now**:
   - Once logged in, users can access the "Vote Now" page to participate in elections or cast their votes.

6. **Logout**:
   - Users can log out of their accounts when they're done.

## Installation

### Prerequisites

Ensure you have the following installed:
- Apache server (XAMPP)
- PHP
- MySQL
- Code editor (e.g., VSCode)

### Clone the repository
```bash
git clone https://github.com/shivlalsharma/online-voting-system.git
cd online-voting-system
```
### Set up the Database:

1. **Access phpMyAdmin**: Open `http://localhost/phpmyadmin/` in your browser.
2. **Create a new database**: Create a new database (e.g., `voting`).
3. **Import the database schema** (if available) to create the tables.
4. **Update database connection settings** in `connect.php`:
```php
$servername = "localhost";
$username = "root";
$password = "";  // Default MySQL password
$dbname = "voting";  // Name of your database
```

### Configure Server:

1. Ensure **Apache** and **MySQL** servers are running in **XAMPP**.
2. Place the project folder (`online-voting-system`) in the `htdocs` directory of XAMPP.


### Access the Application:

1. Open your browser and go to `http://localhost/online-voting-system`.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Author

Created and deployed by **Shivlal Sharma**.  
- **GitHub**: [Shivlal Sharma's GitHub](https://github.com/shivlalsharma)
- **LinkedIn**: [Shivlal Sharma's LinkedIn](https://www.linkedin.com/in/shivlal-sharma-56ba5a284/)