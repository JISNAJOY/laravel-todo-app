# Laravel Todo Application

A simple **Laravel Todo Application** built with **Laravel 11**, featuring:

- **User Authentication** (Laravel Breeze for UI and Sanctum for API)
- **Task CRUD** (Create, Read, Update, Delete) for authenticated users
- **Task Completion Toggle**
- **Pagination**
- **RESTful API** with token-based authentication
- **Policy-based authorization** for user task ownership

---

## 📂 Important Files & Structure

### Controllers

- **TaskController.php**: Handles Blade UI pages for tasks (web routes)  
- **Api/AuthController.php**: Handles API authentication (register/login/logout)  
- **Api/TaskApiController.php**: Handles API CRUD operations for tasks  

### Models

- **User.php**: Uses `HasApiTokens` trait for API authentication via Sanctum  
- **Task.php**: Represents tasks; linked to authenticated user  

### Routes

- **routes/web.php**: Routes for UI (Blade views)  
- **routes/api.php**: Routes for API (JSON responses)  
  - `/api/register` → Register user  
  - `/api/login` → Login user  
  - `/api/logout` → Logout  
  - `/api/tasks` → CRUD operations on tasks (protected by `auth:sanctum`)  

### Blade Views

- **tasks/index.blade.php**: List all tasks (with pagination & completion checkbox)  
- **tasks/create.blade.php**: Form to add a new task  
- **tasks/edit.blade.php**: Form to edit a task  
- **layouts/app.blade.php**: Base layout for Breeze (uses `$slot`)  

---

## 🔄 Application Flow

### Web UI

1. User registers/logs in using **Laravel Breeze forms**  
2. `TaskController` checks policies to ensure the user can only edit/delete their own tasks  
3. Tasks are displayed with:
   - Pagination
   - Completion checkbox (toggles `is_completed`)  
4. Users can create, update, delete tasks through Blade views  

### API (JSON)

1. **Register/Login**
   - `POST /api/register` → Returns user info + token  
   - `POST /api/login` → Returns token  
2. **Protected Routes**
   - Must send **Bearer token** in `Authorization` header  
   - `GET /api/tasks` → List tasks  
   - `POST /api/tasks` → Create task  
   - `PUT/PATCH /api/tasks/{id}` → Update task  
   - `DELETE /api/tasks/{id}` → Delete task  
3. **Logout**
   - `POST /api/logout` → Deletes current API token  

**Token Authentication** is handled via **Laravel Sanctum** (`auth:sanctum` middleware).

---

## 🛠 Setup Instructions

1. Clone the repository:

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

5️⃣For API testing:
Use Postman
Register → Login → Get Bearer token → Access tasks API


