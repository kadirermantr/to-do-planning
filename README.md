# To-Do Planning

- **Programming Language:** PHP
- **Framework:** Laravel
- **Database Diagram:** [Diagram](https://dbdiagram.io/d/To-Do-Planning-65f741e9ae072629ce3a22d5)

## Install

```bash
cp .env.example .env
composer install
php artisan migrate --seed
```

## Run
`php artisan serve`

## Commands

- **Get Tasks**
    - **Signature:** `php artisan app:get-tasks`
    - **Description:** Gets tasks, process them and save to the database

- **Assign Tasks**
    - **Signature:** `php artisan app:assign-tasks`
    - **Description:** Assigns tasks to developers based on their efficiency
