# Web-Based Note-Taking Application

## Overview

This repository hosts the code for a web-based note-taking application designed to facilitate easy management of notes for users and administrators. The application is built using HTML, CSS, JavaScript, and PHP, with Bootstrap for the front-end styling. The back-end relies on a MySQL database, providing a robust and secure environment for storing and retrieving data.

## Features

- Responsive web design for cross-device compatibility
- User authentication system including login, registration, and logout
- Admin dashboard for comprehensive user and note management
- CRUD (Create, Read, Update, Delete) operations for notes
- Search functionality for notes

## Project Structure

The application's file structure is logically organized as follows:

- `adminPage` - Contains all administrative functionalities.
- `noteOperations` - Manages note-related operations.
- `userOperations` - Handles user-related functionalities.
- `auth` - Deals with authentication processes.
- `dashboardIncludes` - Provides common dashboard components.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP 7.x+
- MySQL 5.7+
- Apache server (WAMP, XAMPP, MAMP, or LAMP stack)

### Installation

1. Clone the repo to your local machine or download the ZIP file and extract it.
2. If using WAMP or XAMPP, place the folder in the `www` or `htdocs` directory.
3. Start the Apache and MySQL services.

### Database Setup

1. Navigate to your phpMyAdmin panel and create a new database.
2. Import the provided SQL file from the `database` folder (if available) or execute the SQL statements to create and populate the tables.

### Configuration

Edit the `config.php` file in the root directory to set up the database connection and other global settings.

### Running the Application

1. Open a web browser and go to `http://localhost/<your_project_folder_name>` to view the application. (this will redirect to the index page which will take care of everything)
2. Use the default admin credentials or register as a new user to access the user dashboard.

## Usage

- **Admin Dashboard**: Access the admin functionalities by navigating to `admin_dash.php`.
- **User Dashboard**: Perform note operations such as adding, viewing, editing, and deleting notes through the user dashboard.


## Authors

- **Tariq Ahmad** - *Initial work* - [Tariq](https://github.com/godofcode007)
- **Mohammad Rauf** - *Development* - [Rauf](https://github.com/mohammadrauf0)
- **Dania Ayad** - *Design* - [Dania](https://github.com/Cactuskiller)


## Acknowledgments

- Hat tip to anyone whose code was used
- Inspiration
- etc

