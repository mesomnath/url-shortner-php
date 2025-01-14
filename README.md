# URL Shortener

This repository contains a simple URL shortener application.

## Features:

* **URL Shortening:** Create short, memorable URLs for long links.
* **Custom Short Codes:** Optionally specify your own custom short codes.
* **Database Storage:** Stores short codes and their corresponding long URLs in a database.
* **Basic Error Handling:** Handles invalid URLs and other potential issues.

### Technologies Used:

* **PHP:** Server-side scripting language.
* **MySQL:** Relational database for storing data.
* **HTML, CSS, JavaScript:** For the user interface.
* **.htaccess:** For URL rewriting and routing.

### Installation:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/mesomnath/url-shortner-php.git

2. **Create a database:**

 2.1. Create a database named url_shortener (or your preferred name).
Using MySQL:
SQL
```bash
CREATE DATABASE url_shortener;
CREATE TABLE `link_details` (
  `id` int(255) NOT NULL,
  `full_url` varchar(255) NOT NULL,
  `short_url_value` varchar(255) NOT NULL,
  `new_url` varchar(255) NOT NULL,
  `click_count` int(255) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
)
```
2.2. Configure database credentials:

Open **includes/config.php** and update the database credentials (host, username, password, database name).
Run the server:

Use a web server (e.g., Apache, Nginx) to host the application.
Usage:

Access the application: Visit the base URL in your browser.
Enter the long URL: Paste the long URL in the input field.
Create short URL: Click the "Shorten URL" button.
Get the shortened URL: The generated short URL will be displayed.
Access the original URL: Visit the shortened URL in your browser to be redirected to the original URL.
Contributing:


Contributions are welcome! Please submit a pull request with your changes.

### License:

This project is licensed under the MIT License - see the LICENSE file for details.


## Authors

- Follow Me: [👉 @mesomnath](https://www.github.com/mesomnath)
