# Famoleras TSA2 — Tasks for Today Management System

## Project Description

The Tasks for Today Management System is a web application developed using **CodeIgniter 4, PHP, and MySQL** for IT0049 — Web System Technologies.

This project extends TSA1 by adding user authentication, task creation, editing, validation, and task archiving.

The system allows visitors to view tasks publicly, while only authenticated users can create, edit, or archive tasks.

## Features

### TSA1 Features
- Welcome page displaying tasks scheduled for today
- Task List page displaying all tasks ordered by date
- Profile page displaying one demo user's information
- About page identifying the developer
- MySQL database integration using CodeIgniter Models and Query Builder

### TSA2 Features
- User login with username and password
- Secure password hashing using `password_hash()`
- Password verification using `password_verify()`
- Session-based authentication
- Logout functionality
- Authentication filter for protected routes
- Add New Task form
- Task form validation
- Edit and update existing tasks
- Archive tasks instead of permanently deleting them
- Exclude archived tasks from Welcome and Task List pages
- Redirect unauthenticated users to the login page when accessing protected actions

## Technologies Used

- PHP
- CodeIgniter 4
- MySQL
- HTML5
- CSS3
- Composer
- XAMPP
- Git and GitHub

## Database Structure

The application uses a MySQL database named `famoleras_tsa2`.

### Tasks Table

| Column | Data Type | Description |
|---|---|---|
| id | INT | Primary key, auto-increment |
| title | VARCHAR(150) | Task title |
| status | VARCHAR(20) | Task status, default `pending` |
| task_date | DATE | Scheduled task date |
| created_at | DATETIME | Date and time created |
| is_archived | TINYINT(1) | Archive flag, default `0` |

### Users Table

| Column | Data Type | Description |
|---|---|---|
| id | INT | Primary key, auto-increment |
| username | VARCHAR(50) | Unique username |
| full_name | VARCHAR(100) | User's full name |
| email | VARCHAR(100) | User's email |
| created_at | DATETIME | Account creation date |
| password | VARCHAR(255) | Hashed password |

## Installation and Local Setup

1. Clone or download this repository.
2. Open the project folder in VS Code.
3. Install dependencies using:

   `composer install`

4. Start Apache and MySQL in XAMPP.
5. Open phpMyAdmin at `http://localhost/phpmyadmin`.
6. Create a database named `famoleras_tsa2`.
7. Import the included `famoleras_tsa2.sql` file.
8. Copy the CodeIgniter `env` file and rename the copy to `.env`.
9. Configure the `.env` file:

   ```ini
   CI_ENVIRONMENT = development

   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = famoleras_tsa2
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
   database.default.port = 3306
   ```

10. Start the CodeIgniter development server:

   `php spark serve`

11. Open the application at `http://localhost:8080`.

## Application Routes

| Route | Description | Access |
|---|---|---|
| `/` | Welcome — today's tasks | Public |
| `/tasks` | Full Task List | Public |
| `/profile` | Demo User Profile | Public |
| `/about` | Developer Information | Public |
| `/login` | Login Page | Public |
| `/tasks/new` | Create Task Form | Authenticated |
| `/tasks/create` | Save New Task (POST) | Authenticated |
| `/tasks/edit/{id}` | Edit Task Form | Authenticated |
| `/tasks/update/{id}` | Update Task (POST) | Authenticated |
| `/tasks/archive/{id}` | Archive Task (POST) | Authenticated |
| `/logout` | Logout (POST) | Authenticated session |

## Authentication Process

1. A user opens the Login page.
2. The user enters their username and password.
3. The application retrieves the matching user from MySQL using `UserModel`.
4. The submitted password is verified against the stored hash using `password_verify()`.
5. On successful login, the session ID is regenerated and authenticated user information is stored in the session.
6. The authentication filter checks the session before allowing task management actions.
7. Unauthenticated users are redirected to `/login`.
8. Logout destroys the session and redirects the user to the login page.

## Task Management

### Create Task

Authenticated users can create tasks by entering a task title, scheduled date, and status.

The form validates required fields before saving the record to MySQL.

### Edit Task

Authenticated users can update the title, status, and scheduled date of an existing task.

The edit form is pre-filled with the task's current information.

### Archive Task

Tasks are not permanently deleted.

Instead, the application sets:

`is_archived = 1`

Archived tasks remain stored in the database but are excluded from the Welcome and Task List pages.

## Access Control

The Welcome, Task List, Profile, and About pages are publicly accessible.

Creating, editing, updating, and archiving tasks requires an authenticated session.

The application uses `AuthFilter.php` to protect task management routes.

## Testing

The following functionality should be verified before submission:

- Public pages are accessible without login.
- Invalid login credentials are rejected.
- Valid credentials create an authenticated session.
- Unauthenticated users cannot access task creation or editing pages.
- Required task fields are validated.
- New tasks are saved to the database.
- Edited tasks display updated information.
- Archived tasks disappear from public task listings but remain in MySQL.
- Logout destroys the session.
- Protected actions redirect to login after logout.

## Security

- Passwords are stored using secure hashes rather than plaintext.
- Passwords are verified using `password_verify()`.
- Sessions are regenerated after successful authentication.
- Protected routes use a CodeIgniter authentication filter.
- Database credentials are stored in `.env`.
- The `.env` file must not be uploaded to a public GitHub repository.
- Real login credentials and password hashes should not be published in database exports.

## Database Export

The repository includes `famoleras_tsa2.sql`, containing the database schema and appropriate sample data for reproducing the project.

For a public repository, use sanitized sample data and provide a secure way to initialize a demonstration account.

## Developer

**Lance Kevin Famoleras**

IT0049 — Web System Technologies

**Assessment:** Technical Summative Assessment 2 (TSA2)

## Submission

**GitHub Repository:**  
https://github.com/kevinfamoleras-beep/FamolerasTSA2

