# ProjectManager

A lightweight **Project & Client Management** web application built with **PHP**, **MySQL**, and a custom **MVC architecture**. The application enables authenticated users to manage clients, projects, and detailed project positions through a clean and responsive web interface.

Designed as a portfolio project, ProjectManager demonstrates object-oriented PHP development, custom routing, secure authentication, relational database design, and server-side rendering without relying on a full-stack framework.

---

## Features

### Authentication

- Secure user login using hashed passwords (`password_hash()` / `password_verify()`)
- Session-based authentication
- Protected application routes
- User-specific data isolation

### Dashboard

- Overview of recently created clients
- Overview of recently created projects
- Quick navigation to all modules

### Client Management

- Create clients
- View client details
- Edit client information
- Delete clients
- User-specific client storage

### Project Management

- Create projects
- View project details
- Edit existing projects
- Delete projects
- Assign projects to clients
- Track project status
- Due date management

### Dynamic Project Positions

Each project can contain up to **15 individual positions**, allowing projects to be broken down into multiple work packages.

Each position stores:

- Title
- Description
- Estimated hours
- Hourly rate

Positions can be added and removed dynamically using JavaScript.

### User Experience

- Bootstrap 5 responsive interface
- Font Awesome icons
- jQuery UI autocomplete for client selection
- Flash messages for user feedback
- Color-coded project status badges

---

# Screenshots

## Login

*(Screenshot)*

---

## Dashboard

*(Screenshot)*

---

## Client Overview

*(Screenshot)*

---

## Project Overview

*(Screenshot)*

---

## Project Details

*(Screenshot)*

---

## Project Editor

*(Screenshot)*

---

# Technologies

### Backend

- PHP
- Object-Oriented Programming (OOP)
- Custom MVC Architecture
- PDO
- MySQL

### Frontend

- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- jQuery
- jQuery UI
- Font Awesome

---

# Architecture

The application follows a traditional MVC architecture.

```
Browser
    │
index.php
    │
Custom Router
    │
Controllers
    │
Models
    │
PDO
    │
MySQL
```

Project structure:

```
/
│
├── app/
│   ├── controllers/
│   ├── core/
│   ├── models/
│   └── views/
│       ├── clients/
│       ├── dashboard/
│       ├── layout/
│       ├── login/
│       └── projects/
│
├── config/
│
├── index.php
└── .htaccess
```

---

# Database Design

The application uses a relational MySQL database.

```
Users
 │
 ├──────────────┐
 │              │
Clients      Projects
                  │
             Project Positions
```

Each user only has access to their own clients and projects.

---

# Security

The application implements several security measures:

- PDO prepared statements to prevent SQL injection
- Password hashing using `password_hash()`
- Password verification using `password_verify()`
- Session-based authentication
- Route protection for authenticated users
- User ownership validation for database queries
- Server-side input validation

---

# Installation

## Requirements

- PHP 8+
- MySQL
- Apache (XAMPP recommended for local development)
- PDO MySQL Extension

### 1. Clone the repository

```bash
git clone https://github.com/F-Dreiling/ProjectManager.git
```

Alternatively, download the project as a ZIP file from GitHub.

### 2. Place the project inside your web server root

For example using XAMPP:

```
xampp/
└── htdocs/
    └── projectmanager/
```

### 3. Create the database

Create a MySQL database named:

```
projectmanager
```

Import the provided database schema.

### 4. Configure the database connection

Copy

```
config/example.config.php
```

to

```
config/config.php
```

and update the database credentials if necessary.

### 5. Create the first user

For security reasons, user registration is **not** included in the application.

An `example.seed.php` file is provided to help create the initial user.

1. Copy `example.seed.php` to `seed.php`.
2. Place it inside the `config` directory.
3. Edit the file and replace the placeholder values:
4. Open the following URL in your browser:

```
http://localhost/projectmanager/config/seed.php
```

5. After the user has been created successfully, **delete `seed.php` immediately** for security reasons.

### 6. Launch the application

Open:

```
http://localhost/projectmanager
```

---

# Future Improvements

Potential future enhancements include:

- User registration
- Password reset functionality
- File attachments
- Project search and filtering
- Dashboard statistics
- PDF quotation generation
- Time tracking
- REST API
- Role and permission management

---

# What I Learned

This project helped reinforce many core concepts of server-side web development, including:

- Building a complete MVC application without using a framework
- Designing a custom routing system
- Structuring object-oriented PHP applications
- Working with relational databases using PDO
- Implementing secure authentication
- Managing user sessions
- Building reusable layouts and views
- Creating dynamic user interfaces with JavaScript and jQuery
- Designing maintainable CRUD applications

---

# License

This project was created for educational and portfolio purposes.