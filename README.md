# Museum Exhibition Information System

Laravel practical task — **Variant XIV**: manage museums and exhibitions with authentication.

## Requirements covered

1. **MySQL structure** — `museums` and `exhibitions` tables (see `database/schema.sql` and migrations).
2. **CRUD UI** — add, edit, delete museums and exhibitions; museum selected from dropdown; exhibitions sorted by date.
3. **Museum filter** — filter exhibition list by museum on the exhibitions page.
4. **Authentication** — only logged-in users can create, update, or delete data; guests can browse the list.
5. **GitHub** — push this repository to your GitHub account (see below).

## Database tables

| Table | Fields |
|-------|--------|
| `museums` | `id`, `name`, timestamps |
| `exhibitions` | `id`, `title`, `description`, `date`, `museum_id` (FK), timestamps |

## Setup

### 1. Install dependencies

```bash
composer install
npm install
npm run build
```

### 2. Environment

Copy `.env.example` to `.env` and configure MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=museum_exhibitions
DB_USERNAME=root
DB_PASSWORD=your_password
```

Create the database:

```sql
CREATE DATABASE museum_exhibitions CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Generate application key (if needed):

```bash
php artisan key:generate
```

### 3. Migrate and seed

```bash
php artisan migrate:fresh --seed
```

Demo user after seeding:

- **Email:** `admin@example.com`
- **Password:** `password`

### 4. Run the application

```bash
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Usage

- **Guests:** view exhibitions, filter by museum.
- **Registered users:** log in or register, then manage museums and exhibitions (add / edit / delete).

## Upload to GitHub

```bash
git init
git add .
git commit -m "Museum Exhibition Information System - Variant XIV"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/museum-laravel.git
git push -u origin main
```

Replace `YOUR_USERNAME` and repository name with your own.

## Project structure

- `app/Models/Museum.php`, `app/Models/Exhibition.php` — Eloquent models
- `app/Http/Controllers/MuseumController.php`, `ExhibitionController.php` — CRUD logic
- `database/migrations/` — Laravel migrations
- `resources/views/exhibitions/`, `resources/views/museums/` — Blade templates
- `routes/web.php` — routes (public list + auth-protected management)
