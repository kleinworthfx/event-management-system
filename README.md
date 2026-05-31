# Event Management System

## Laravel 12 Web Application

A full-featured event management system with role-based access control (Admin, Organizer, Attendee).

## Features
- User authentication with Laravel Breeze
- Complete event CRUD operations
- Event registration with approval workflow
- Role-specific dashboards
- Calendar view using FullCalendar.js
- Capacity management to prevent overbooking

## Tech Stack
- Laravel 12
- PHP 8.2
- SQLite / MySQL
- Blade Templates
- FullCalendar.js

## Setup Instructions
1. Clone repository
2. Run \composer install\
3. Run \
pm install && npm run build\
4. Copy \.env.example\ to \.env\
5. Run \php artisan key:generate\
6. Run \php artisan migrate --seed\
7. Run \php artisan serve\

## Default Login Credentials
- Admin: admin@example.com / password
- Organizer: organizer@example.com / password
- Attendee: attendee@example.com / password

