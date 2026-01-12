# Laravel Todo application 📝

A simple Laravel Todo application built to learn and demonstrate core Laravel concepts such as routing, controllers, authentication, validation, and Blade components.

---

## 🚀 Features

- User authentication (Login & Register)
- Create, read, update, and delete tasks
- Tasks are user-specific
- Form request validation
- Authorization checks
- Laravel Breeze with Blade components
- Clean and simple UI using Tailwind CSS

---

## 🛠 Tech Stack

- Laravel
- PHP
- MySQL
- Laravel Breeze
- Blade (Components)


---

## 📂 Project Structure (Important Files)
app/
├── Http/
│ ├── Controllers/TaskController.php
│ └── Requests/StoreTaskRequest.php
├── Models/
│ ├── Task.php
│ └── User.php

resources/
├── views/
│ ├── tasks/
│ │ ├── index.blade.php
│ │ ├── create.blade.php
│ │ └── edit.blade.php
│ └── layouts/app.blade.php


---

## ⚙️ Installation & Setup

### 1️⃣ Clone the repository
```bash
git clone https://github.com/your-username/laravel-todo-app.git
cd laravel-todo-app
```
2️⃣ Install dependencies
composer install
npm install
npm run dev

3️⃣ Environment setup
cp .env.example .env
php artisan key:generate

Update your .env file with database credentials:

DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Run migrations
php artisan migrate

5️⃣ Serve the application
php artisan serve

open
http://127.0.0.1:8000


