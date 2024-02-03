# Facebook Login Solution with Selenium WebDriver (PHP)

## Introduction

This repository contains a PHP script for automating the login process on Facebook using Selenium WebDriver. The script uses the `WebDriver` and `WebDriverBy` classes from the Facebook PHP WebDriver library.

## Prerequisites

- [Composer](https://getcomposer.org/): Dependency manager for PHP.
- [Selenium Server](https://www.selenium.dev/downloads/): Ensure the Selenium Server is running locally or accessible via the specified URL.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/facebook-login-selenium-php.git
    ```

2. Install dependencies using Composer:

    ```bash
    cd facebook-login-selenium-php
    composer install
    ```

## Configuration

1. Open the script file `facebook_login_script.php` in your preferred text editor.

2. Update the following lines with your Facebook login credentials:

    ```php
    // Replace with your Facebook credentials
    $this->driver->findElement(WebDriverBy::id('email'))->sendKeys('your_email@example.com');
    $this->driver->findElement(WebDriverBy::id('pass'))->sendKeys('your_facebook_password');
    ```
Note : Added a Valid temp login for run and get the results

3. Adjust any other parameters or conditions in the script according to your requirements.

## Usage

Run the script from the command line:

```bash
php facebook_login_script.php
