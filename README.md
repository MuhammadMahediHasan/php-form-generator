# Dynamic Form Generator

This project dynamically generates an HTML form based on the structure of a database table. The form adapts automatically to any changes in the database schema, ensuring that the form fields always reflect the database's current state.

## Features
- **Dynamic Form Creation**: Automatically generates form fields based on the database table columns.
- **Bootstrap Integration**: Uses Bootstrap 5 for a clean and responsive design.
- **Input Type Matching**: Matches database column types to appropriate HTML input fields (e.g., `int` to `number`, `varchar` to `text`, `date` to `date`).
- **Automatic Validation**: Adds required attributes to fields based on database nullability.

## File Structure
```plaintext
.
├── database.php         # Handles database connection.
├── formGenerator.php    # Generates the HTML form dynamically.
├── index.php            # Main entry point to display the form.
├── README.md            # Documentation.
```

## Prerequisites
- PHP 8.0 or later (to support `match` expressions).
- MySQL database.
- Web server (e.g., Apache, Nginx, or XAMPP).
- Composer (optional, for dependency management).

## Installation
1. Clone the repository or download the source files.
2. Update `database.php  ` with your database credentials:
   ```php
   $serverName = "127.0.0.1";
   $userName = "root";
   $password = "";
   $dbName = "your_database_name";
   ```
3. Specify the table name in `index.php`:
   ```php
   $table_name = "your_table_name";
   ```
4. Start your web server and navigate to `index.php` in your browser.

## Usage
1. Open the `index.php` file in your browser.
2. The script will fetch the database table schema and generate a form dynamically.

## Example Output
- Fields are rendered as per the database columns.
- Validation is added to fields marked as `NOT NULL` in the database.
- Enum fields are rendered as dropdowns with predefined options.

## Customization
- Modify the Bootstrap classes in `formGenerator.php` to customize the design.
- Extend `formGenerator.php` to handle additional column types if needed.

## Troubleshooting
- Ensure your database credentials are correct in `database.php`.
- Verify the database and table exist.
- Check PHP error logs for detailed error messages if the script fails.

## License
This project is open-source and available under the [MIT License](LICENSE).

