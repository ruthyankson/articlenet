# ArticleNet App

ArticleNet is a web application developed using CodeIgniter 4, designed to perform basic CRUD (Create, Read, Update, Delete) operations on articles. This app serves as a mock application to demonstrate the functionality and structure of a typical article management system.

## App Demo



## Features

- **Create Articles**: Add new articles with a title, content, and author information.
- **Read Articles**: View a list of all articles or read individual articles.
- **Update Articles**: Edit the content of existing articles.
- **Delete Articles**: Remove articles from the database.

## Technology Stack

- **Framework**: CodeIgniter 4
- **Database**: MySQL
- **Language**: PHP

## Prerequisites

Before you begin, ensure you have met the following requirements:

- You have installed PHP >= 8.1
- You have a MySQL/PostgreSQL database setup
- You have installed Composer

## Installation

To set up the ArticleNet app, follow these steps:

1. **Clone the Repository**

   ```sh
   git clone https://github.com/ruthyankson/articlenet.git
   cd articlenet
    ```

2. **Install Dependencies**

Install the required dependencies using Composer.

    ```sh
    composer install
    ```

3.  **Set Up Environment Variables**

Rename the .env.example file to .env and configure your database settings

    ```ini
    # .env

    CI_ENVIRONMENT = development

    database.default.hostname = localhost
    database.default.database = articlenet_db
    database.default.username = your_db_username
    database.default.password = your_db_password
    database.default.DBDriver = PostgreSQL
    ```

4. **Set Up Database**

Create your database using your favourite SQL variation and run similar commands as can be found in the *databasefile.txt* to create tables and insert values accordingly.

## Usage

Start the development server.

    ```sh
    php spark serve
    ```

## License

This project is licensed under the MIT License - see the LICENSE file for details.

<hr>

This README file provides a brief overview of the ArticleNet app, including its features, technology stack, prerequisites, installation steps, usage, and license information.
