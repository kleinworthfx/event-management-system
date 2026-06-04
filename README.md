# Event Management System
 
A full-featured web application for creating, managing, and registering for events. Built with Laravel 12 and designed around a role-based access control system that supports three distinct user types: **Admin**, **Organizer**, and **Attendee**.
 
---
 
## Technologies & Frameworks
 
| Layer | Technology |
|---|---|
| Backend Framework | Laravel 12 (PHP 8.2) |
| Authentication | Laravel Breeze |
| Database | MySQL (SQLite supported) |
| Frontend Templating | Blade Templates |
| CSS Styling | Tailwind CSS |
| Asset Bundling | Vite |
| Calendar UI | FullCalendar.js |
| API Protection | Laravel Sanctum |
 
---
 
## Setup & Installation
 
### Prerequisites
 
Make sure the following are installed on your machine before proceeding:
 
- PHP 8.2 or higher
- Composer
- Node.js (v18 or higher) and npm
- MySQL (or use SQLite for local development)
### Steps
 
**1. Clone the repository**
```bash
git clone <repository-url>
cd event-management-system
```
 
**2. Install PHP dependencies**
```bash
composer install
```
 
**3. Install JavaScript dependencies and build assets**
```bash
npm install && npm run build
```
 
**4. Set up your environment file**
```bash
cp .env.example .env
```
 
Open `.env` and update your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=event_management_system
DB_USERNAME=root
DB_PASSWORD=your_password
```
 
**5. Generate the application key**
```bash
php artisan key:generate
```
 
**6. Run migrations and seed the database**
```bash
php artisan migrate --seed
```
 
This creates all tables and populates the database with default users and sample events.
 
**7. Start the development server**
```bash
php artisan serve
```
 
Visit `http://localhost:8000` in your browser.
 
> If using Laravel Herd or Valet, the app will be available at `http://event-management-system.test` without needing `artisan serve`.
 
---
 
## Default Login Credentials
 
These accounts are created automatically by the database seeder.
 
| Role | Email | Password |
|---|---|---|
| Admin | admin@example.com | password |
| Organizer | organizer@example.com | password |
| Attendee | attendee@example.com | password |
 
---
 
## How to Use the Application
 
### User Registration
 
New users can register by clicking **Register** on the login page. During registration, the default role assigned is **Attendee**. Role elevation to Organizer or Admin must be done by an existing Admin through the database or a future admin panel.
 
---
 
### Admin
 
The Admin has full control over the entire system.
 
- **Dashboard** — Overview of all events and registrations across the platform
- **Manage Events** — View, edit, or delete any event created by any organizer
- **Manage Registrations** — Approve or decline any attendee registration for any event
- **Create Events** — Admins can also create and own events directly
**Admin-specific actions:**
```
Approve registration  → PATCH /registrations/{id}/approve
Decline registration  → PATCH /registrations/{id}/decline
Delete any event      → DELETE /events/{id}
```
 
---
 
### Organizer
 
Organizers can create and manage their own events and control who attends them.
 
- **Dashboard** — Summary of their own events and pending registrations
- **Create Event** — Add a new event with title, description, date, location, and max attendee capacity
- **Edit/Delete Event** — Modify or remove events they own
- **Approve/Decline Registrations** — Review attendee requests for their events
**To create an event:**
1. Log in as Organizer
2. Navigate to **Events → Create Event**
3. Fill in the event details and submit
4. The event appears in the events list and calendar view immediately
**To manage registrations:**
1. Go to the event detail page
2. View the list of pending registrations
3. Click **Approve** or **Decline** per attendee
---
 
### Attendee
 
Attendees can browse available events and register to attend them.
 
- **Dashboard** — Shows upcoming events and the status of their own registrations
- **Browse Events** — View all available events with details
- **Register for Event** — Submit a registration request (subject to organizer/admin approval)
- **Cancel Registration** — Withdraw from an event before it takes place
- **Calendar View** — Visual overview of all events on a calendar
**To register for an event:**
1. Log in as Attendee
2. Go to **Events**
3. Click on an event to view its details
4. Click **Register** — your registration will show as **Pending** until approved
5. Once approved, your status updates to **Approved**
> Registration is blocked automatically when an event has reached its maximum attendee capacity.
 
---
 
## Registration Workflow
 
```
Attendee submits registration → Status: Pending
        ↓
Organizer / Admin reviews
        ↓
    Approved ✓         Declined ✗
```
 
---
 
## Calendar View
 
Navigate to `/calendar` to see all events plotted on an interactive calendar powered by FullCalendar.js. Click any event on the calendar to view its detail page.
 
---
 
## Project Structure (Key Directories)
 
```
app/
├── Http/
│   └── Controllers/
│       ├── EventControllerABC.php        # Handles event CRUD operations
│       ├── RegistrationControllerABC.php # Handles registration approve/decline/cancel
│       └── DashboardControllerABC.php    # Role-based dashboard logic
├── Models/
│   ├── EventABC.php                      # Event model with organizer relationship
│   └── RegistrationABC.php              # Registration model with status tracking
database/
├── migrations/                           # Table definitions
└── seeders/
    ├── DatabaseSeeder.php                # Main seeder with sample events
    └── UserRoleSeeder.php               # Seeds default role accounts
resources/
└── views/
    ├── layouts/                          # App shell layouts
    ├── auth/                             # Login, register pages
    └── events/                           # Event list, detail, create, edit views
routes/
└── web.php                              # All application routes
```
 
---
 
## Troubleshooting
 
**`bootstrap/cache` error on `composer install`**
```bash
mkdir bootstrap/cache
composer install
```
 
**Blank page / no styling**
```bash
npm run build
php artisan view:clear
php artisan cache:clear
```
 
**Sessions table not found**
```bash
php artisan session:table
php artisan migrate
```