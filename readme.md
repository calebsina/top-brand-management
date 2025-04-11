# Laravel API - Brands Management

This is a lightweight Laravel backend project designed to provide brand data via a REST API. The frontend only consumes and displays the list of brands—no form submissions, updates, or deletions are required.
updates, deletions and creations can be done via api end point
---

## 🚀 Requirements

- PHP >= 8.1
- Composer
- MySQL or any supported database
- Laravel 10+

---

## 📦 Installation

Follow these steps to set up the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name

2.) install depedencies and configure environment
  - composer install
  - cp .env.example .env
edit the .env to match your local configurations
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database_name
  DB_USERNAME=your_username
  DB_PASSWORD=your_password
Generate app key
  - php artisan key:generate
Run Migrations
  - php artisan migrate
serve the application
  PHP artisan serve
the applcation can be assed at
  http://127.0.0.1:8000

3.) Accessing API documentation
  - http://127.0.0.1:8000/docs
  - base url: http://127.0.0.1:8000/api/

Email: [mabucaleb@gmail.com]

