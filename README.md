# Laravel Todo

A task management application built with Laravel 12, MySQL, and Tailwind CSS. Built as a progression from a raw PHP implementation to a fully structured MVC application with authentication and user-scoped data.

---

## Features

- User registration, login, and logout
- Each user sees only their own tasks
- Create, edit, delete, and toggle tasks
- Task completion counter
- Filter tasks by All, Active, and Completed
- Flash messages on every action
- Server-side form validation
- Route protection — all task routes require authentication
- Task authorization — users cannot modify another user's tasks

---

## Tech Stack

- **Backend** — Laravel 12, PHP 8.2
- **Database** — MySQL
- **Frontend** — Blade templating, Tailwind CSS
- **Build Tool** — Vite
- **Authentication** — Laravel Breeze
- **Version Control** — Git & GitHub

---

## Project Structure 

```
todo-laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── TaskController.php       # Handles all task actions
│   │   └── Auth/                    # Breeze authentication controllers
│   ├── Models/
│   │   ├── Task.php                 # Task model
│   │   └── User.php                 # User model with task relationship
│   └── Policies/
│       └── TaskPolicy.php           # Authorizes task actions per user
├── database/
│   └── migrations/                  # All database migrations
├── resources/
│   ├── css/
│   │   └── app.css                  # Tailwind entry point
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php        # Main layout
│       │   └── navigation.blade.php # Nav bar
│       ├── tasks/
│       │   └── index.blade.php      # Task list UI
│       └── auth/                    # Breeze auth views
├── routes/
│   ├── web.php                      # Application routes
│   └── auth.php                     # Breeze auth routes
└── vite.config.js                   # Vite configuration
```

---

## Requirements

- PHP 8.2+
- Composer
- MySQL
- Node.js & npm
- A local server environment (XAMPP or similar)

---

