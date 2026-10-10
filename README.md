# Famoleras TSA1 — Tasks for Today Management System

## Description

A task management web application developed using CodeIgniter 4 and MySQL for IT0049 — Web System Technologies.

## Features

- Welcome page displaying only today's tasks
- Task List displaying all tasks ordered by date
- Profile page displaying one demo user
- About page identifying the developer
- Database integration using CodeIgniter Models and Query Builder

## Technologies

- PHP
- CodeIgniter 4
- MySQL
- HTML and CSS
- Composer
- XAMPP

## Installation

1. Clone or download the repository.
2. Run `composer install`.
3. Start MySQL using XAMPP.
4. Create a database named `famoleras_tsa1`.
5. Import `famoleras_tsa1.sql` using phpMyAdmin.
6. Copy the `env` file to `.env` and configure:

```ini
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = famoleras_tsa1
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

7. Run `php spark serve`.
8. Open `http://localhost:8080`.

## Pages

| Page | URL |
|---|---|
| Welcome | `/` |
| Task List | `/tasks` |
| Profile | `/profile` |
| About | `/about` |

## Database

The application contains two tables:

- `tasks` — eight sample tasks across three dates
- `users` — one demo user

## Developer

Lance Kevin Famoleras

IT0049 — Web System Technologies  
Technical Summative Assessment 1