# ContactHub - Contact Information Management System

ContactHub is a robust PHP-based Contact Information Management System designed to help you manage and organize contact information efficiently.

## Features

### Contact Information Form
1. Create a form with fields for First Name, Last Name, Email, Phone Number, and Message.
2. Implement both client-side and server-side validation for email and phone number formats.
3. Ensure a clean and user-friendly layout using HTML and CSS.

### Database Integration
4. Utilize a relational database (e.g., MySQL) to securely store contact information.
5. Implement prepared statements to prevent SQL injection attacks.
6. Design a well-structured database schema with appropriate indexing.

### Table View
7. Develop an interactive table to display all submitted contact information.
8. Include columns for First Name, Last Name, Email, Phone Number, and Message.
9. Use HTML and CSS for an organized and readable table layout.
10. Implement server-side pagination for efficient handling of large datasets.

### Edit Functionality
11. Provide an interface to edit existing contact entries.
12. Use AJAX for seamless editing without page reloads.
13. Validate and sanitize user inputs during the editing process.
14. Ensure that changes are accurately reflected in the database.

### Delete Functionality
15. Allow users to delete contact entries with a confirmation prompt.
16. Implement secure deletion mechanisms to prevent accidental or malicious actions.
17. Ensure data consistency in the database after deletion.

### Security Measures
18. Implement protection against Cross-Site Scripting (XSS) and Cross-Site Request Forgery (CSRF).
19. Hash sensitive data (e.g., passwords) and store it securely.

### User Feedback
20. Display clear success or error messages after form submissions, edits, or deletions.
21. Utilize asynchronous notifications for a seamless user experience.

### Code Organization
22. Organize code using a modular approach, employing functions or classes.
23. Include comments to explain complex logic or important security considerations.
24. Utilize version control (e.g., Git) for tracking changes and collaborative development.

## Getting Started

1. Clone the repository:

   ```bash
   git clone https://github.com/VijithaBandara/ContactHUB.git

Set up your database by importing the provided SQL file (contacthub.sql).

Configure the database connection in dbcon.php with your credentials.

Access the project through a web server or a local development environment.