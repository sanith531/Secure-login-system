# SecureLoginSSO

A secure login system with Single Sign-On (SSO) capabilities, developed using HTML, CSS, and PHP.

## Features

- **Strong Password Hashing**: Ensures user passwords are securely stored using industry-standard hashing algorithms.
- **Secure Session Management**: Manages user sessions securely to prevent session hijacking and fixation.
- **Account Lockout Mechanisms**: Protects against brute force attacks by locking accounts after a number of failed login attempts.
- **Multi-Factor Authentication (MFA)**: Adds an extra layer of security by requiring a second form of authentication.
- **Input Validation**: Ensures all user inputs are validated to prevent malicious data from being processed.
- **Protection Against Common Vulnerabilities**:
  - **SQL Injection**: Prevents unauthorized database access through crafted SQL queries.
  - **Cross-Site Scripting (XSS)**: Protects against attacks that inject malicious scripts into webpages.
  - **Brute Force Attacks**: Implements measures to prevent automated attempts to guess user passwords.
- **User Database Integration**: Allows users to register, login, and manage their accounts securely.

## Installation

1. **Clone the Repository**

   ```bash
   git clone [https://github.com/sanith531/Secure-login-system.git]
   cd SecureLoginSSO
   ```

2. **Setup Database**

   - Create a MySQL database.
   - Import the provided `database.sql` file to set up the necessary tables.

3. **Configure Database Connection**

   - Update the database configuration settings in `config.php` with your database credentials.

4. **Install PHP Dependencies**

   - Ensure Composer is installed on your system.
   - Run the following command to install the required PHP dependencies:

   ```bash
   composer install
   ```

   This will read the `composer.json` file and install the dependencies specified, locking them to the versions in the `composer.lock` file.

5. **Run the Project**

   - Ensure your server supports PHP and has the necessary extensions enabled.
   - Place the project files in your server's root directory.
   - Access the project via your browser.

## Usage

1. **Register a New User**

   - Navigate to the registration page and fill out the required information.

2. **Login**

   - Navigate to the login page and enter your credentials.
   - If MFA is enabled, complete the second form of authentication.

3. **Account Management**

   - Once logged in, users can update their account details and manage their settings securely.

## Security Measures

- **Password Hashing**: Utilizes bcrypt for hashing passwords.
- **Session Management**: Uses secure cookies and regenerates session IDs upon login.
- **Account Lockout**: Temporarily locks accounts after a predefined number of failed login attempts.
- **Multi-Factor Authentication (MFA)**: Supports email-based OTP for additional security.
- **Input Validation**: Sanitizes and validates all user inputs.
- **Vulnerability Protection**: Implements prepared statements for database queries and escapes outputs to prevent XSS.

## Screenshots

### 1. Login Page

![Login Page](screenshots\login.png)

### 2. Register Page

![Register Page](screenshots\register.png)

### 3. Two Factor Authentication

![Two Factor Authentication](screenshots\two-factor-authentication.png)

### 4. Dashboard

![Login Page](screenshots\dashboard.png)

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
