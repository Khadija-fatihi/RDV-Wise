#  Smart santé

A Laravel-based clinic management application for dialysis centers, with role-based support for patients, doctors, and admins. The project includes appointment booking, notification management, medical record access requests, and an admin dashboard.

## Key Features

- Laravel 9 backend with database-driven notifications
- Multi-role authentication: admin, doctor, patient
- Appointment booking, confirmation, and cancellation flows
- Role-specific notification pages for doctor, patient, and admin
- Medical records access request workflow
- Frontend powered by Vite, Bootstrap, and Tailwind CSS

## Cahier des charges

### Objectif
Construire une application de gestion pour Smart santé permettant aux patients, médecins et administrateurs de gérer les rendez-vous, les notifications, les demandes d'accès aux dossiers médicaux et le suivi des consultations.

### Utilisateurs et rôles
- **Administrateur** : gère les notifications globales, consulte les alertes, organise les rendez-vous et supervise les actions.
- **Médecin** : reçoit des notifications de rendez-vous, visualise les consultations et peut traiter les demandes d'accès aux dossiers médicaux.
- **Patient** : réserve des rendez-vous, reçoit des notifications de confirmation/cancellation et demande l'accès à ses dossiers médicaux.

### Fonctionnalités principales
- Authentification utilisateur et rôle basé sur `User::isAdmin()`, `isMedecin()`, `isPatient()`
- Gestion des rendez-vous avec création, validation et annulation
- Notifications stockées en base de données et affichées sur des pages dédiées selon le rôle
- Pages spécifiques : notifications patient, notifications médecin, notifications administrateur
- Workflow de demande d'accès aux dossiers médicaux et réponse par notification
- Interface responsive construite avec Bootstrap et Tailwind CSS

### Architecture
- Backend Laravel 9 avec contrôleurs MVC
- Modèles Eloquent : `Appointment`, `Patient`, `Doctor`, `User`, `Consultation`, `Schedule`, `Aianalysis`
- Notifications via `app/Notifications` et base de données
- Views Blade dans `resources/views`
- Frontend modernisé avec Vite et plugins CSS

### Conception
- Structure par rôle : le système différencie l’administrateur, le médecin et le patient pour afficher des interfaces et des notifications adaptées.
- Flux de rendez-vous : le patient planifie un rendez-vous, le médecin reçoit une notification et l’administrateur peut superviser la confirmation ou l’annulation.
- Notifications et rappel : toutes les actions critiques génèrent des notifications en base de données, avec un contenu adapté au rôle et des indices de livraison par téléphone/email avant la date.
- UX simple et responsive : l’interface combine Bootstrap et Tailwind pour offrir une navigation cohérente, des tableaux de rendez-vous, des cartes de notifications et des actions claires.
- Intégration backend/frontend : le frontend Blade consomme des données Laravel et déclenche des actions par formulaires et requêtes Axios selon les besoins.
- Séparation des responsabilités : les contrôleurs gèrent la logique métier, les modèles Eloquent gèrent les données, les notifications encapsulent les messages et les vues rendent l’interface.

### Technologies et outils
- Backend : PHP ^8.0.2, Laravel 9, Composer
- Authentification : Laravel Sanctum
- Frontend UI/UX : Vite, Bootstrap 5, Tailwind CSS, Axios, date-fns, Lodash
- Thème visuel : Bootstrap 5 pour la structure et les composants, Tailwind CSS pour les styles utilitaires et le design adaptatif
- Base de données : MySQL / MariaDB / PostgreSQL / SQLite via Eloquent ORM
- Dev & tests : Laravel Pint, PHPUnit, FakerPHP, Spatie Ignition

### Contraintes techniques
- Utiliser la base de données pour stocker les notifications et le statut des rendez-vous
- Avoir des pages de notifications séparées par rôle
- Prévoir un système d’envoi de messages de rappel avec date et canaux (téléphone/email) avant les rendez-vous
- Conserver la structure MVC de Laravel et les conventions Blade

## Requirements

- PHP ^8.0.2
- Composer
- Node.js (recommended latest LTS)
- npm
- Database: MySQL, MariaDB, PostgreSQL, or SQLite

## Tools Used

- Backend: Laravel 9, PHP, Composer, Blade templates, Eloquent ORM
- Frontend UI/UX: Vite, Bootstrap, Tailwind CSS, Axios, Blade views
- Database: MySQL / MariaDB / PostgreSQL / SQLite via Laravel database layer

## Installation

1. Clone the repository:

```bash
git clone <repository-url> centre-dialyse
cd centre-dialyse
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install frontend dependencies:

```bash
npm install
```

4. Copy the environment template and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database settings in `.env`.

6. Run migrations and seeders:

```bash
php artisan migrate --seed
```

7. Start the Vite development server:

```bash
npm run dev
```

8. Start the Laravel server:

```bash
php artisan serve
```

## Available Scripts

- `npm run dev` - Start Vite in development mode
- `npm run build` - Build frontend assets for production
- `npm run preview` - Preview the production build

## Environment Variables

Add these keys to `.env` for database and mail configuration:

```env
APP_NAME="Smart santé"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smart santé
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Sample Accounts

Use seeded sample users for testing after running `php artisan migrate --seed`:

- Admin : `admin@gmail.com` / `password`
- Médecin : `medecin1@gmail.com` / `password`
- Patient : `patient1@gmail.com` / `password`

## Running Tests

Run the Laravel test suite using either command:

```bash
php artisan test
```

or:

```bash
./vendor/bin/phpunit
```

## Deployment Notes

Production build and deployment checklist:

- Build frontend assets: `npm run build`
- Install dependencies: `composer install --optimize-autoloader --no-dev`
- Cache config and routes:
  - `php artisan config:cache`
  - `php artisan route:cache`
  - `php artisan view:cache`
- Run migrations: `php artisan migrate --force`
- Ensure storage permissions:
  - `storage` and `bootstrap/cache` writable by the web server user
- Recommended server requirements:
  - PHP ^8.0.2 with extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML, cURL
  - MySQL, MariaDB, PostgreSQL, or SQLite
  - Node.js for asset building

## Project Diagram / Data Model

Main relationships and entities:

- `User` — central authentication record with `role` (`admin`, `medecin`, `patient`)
- `Doctor` — profile linked to a `User`, stores specialty, cabinet, schedule and consultation settings
- `Patient` — profile linked to a `User`, stores medical details, dialyse type and patient metadata
- `Appointment` — belongs to `Patient` and `Doctor`, includes `date_heure`, `statut`, `type_seance`, `motif`, `duree`
- `Consultation` — linked to `Patient` and `Doctor`, stores visit details and follow-up notes
- `Aianalysis` — linked to `Patient` for AI diagnostic data and analytics
- `Notification` — Laravel database notifications linked to users via the `notifications` table

## Future Improvements

Planned enhancements and missing features:

- Add real email/SMS reminder delivery for appointments
- Implement real-time notifications with broadcasting and WebSockets
- Add appointment calendar view and schedule management
- Improve role-based permission control with policies and gates
- Add file upload for medical records and patient history
- Enhance mobile-first UI and accessibility

## Application Structure

- `app/Http/Controllers` - Main backend controllers
- `app/Models` - Eloquent models for Users, Appointments, Patients, Doctors, and more
- `app/Notifications` - Notification classes for database notifications
- `resources/views` - Blade templates for UI pages
- `public` - Public entry point and built assets
- `database/migrations` - Database schema definitions
- `database/seeders` - Seed data for local development
- `frontend` - Frontend assets and Vite entry points

## Project Structure

- `app/Console` - Artisan command scheduling and console kernel
- `app/Exceptions` - Application exception handler
- `app/Http/Kernel.php` - HTTP middleware pipeline
- `app/Http/Middleware` - Custom request middleware
- `app/Mail` - Mailables and notification templates
- `app/Providers` - Service providers and app bootstrapping
- `bootstrap` - Framework bootstrap files and cache
- `config` - Laravel configuration files
- `routes` - Route definitions for web, API, console, and channels
- `resources/css` - Global CSS and Tailwind styles
- `resources/js` - JavaScript entry points and front-end scripts
- `resources/views` - Blade view templates for layouts, pages, and notifications
- `storage` - Logs, cache, and runtime storage
- `tests` - Feature and unit tests
- `vendor` - Composer dependencies

## Notifications

Notifications are delivered through the Laravel database notification system and displayed on role-specific pages.

Implementation details:

- Uses Laravel's built-in notification channel: `database`
- Notification class: `app/Notifications/AppointmentNotification.php`
- Appointment-related notifications are created in `app/Http/Controllers/AppointmentController.php`
- Admin notifications are managed in `app/Http/Controllers/Admin/AdminController.php`
- Notification views:
  - `resources/views/notifications/notifications-patient.blade.php`
  - `resources/views/notifications/notifications-doctor.blade.php`
  - `resources/views/notifications/Admin-notifications.blade.php`
- Each role sees notifications relevant to their user account and appointment actions
- Appointment reminders include delivery channel hints and scheduled date/time details
- Notification payloads are normalized for display with title, message, action buttons, and read/unread state

## Notes

- Use `php artisan migrate:fresh --seed` to reset the database during development.
- Confirm that the `.env` file contains proper database credentials and mail settings if email integration is enabled.

## Contact

For questions or support, review the controller and notification files in the `app/Http/Controllers` and `app/Notifications` directories.

**Author:** Khadija Fatihi
