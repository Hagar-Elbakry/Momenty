# Momenty

Momenty is a Laravel-based social photo sharing application. Users can register, upload and share photos, follow or unfollow other users, and manage their profiles. The app uses Bootstrap for styling and sends a welcome email to new users upon registration.

## Features

- User registration, login, and authentication
- Upload and share photos with captions
- Follow and unfollow other users
- User profiles with bio, profile image, and personal URL
- Responsive Bootstrap-based UI
- Welcome email sent to new users

## Technology Used

- **Backend:** [Laravel](https://laravel.com/) (PHP 8.2+)
- **Frontend:** [Bootstrap](https://getbootstrap.com/) 5
- **Database:** MySQL
- **Package Management:** Composer, npm
- **Build Tools:** Laravel Mix (Webpack)

## File Storage

This project use Laravel's built-in file storage system to handle user-uploaded files, such as profile avatars and posts.
Make sure to create a symbolic link for the `storage` directory with the following command:

```sh
php artisan storage:link
```

Uploaded files are stored in `storage/app/public/` and are accessible via the `public/storage` URL.

## Getting Started

### Requirements

- PHP 8.2+
- Composer
- Node.js & npm

### Installation

1. **Clone the repository**
   ```sh
   git clone (https://github.com/Hagar-Elbakry/Momenty.git)
   cd Momenty
   ```

2. **Install PHP dependencies**
   ```sh
   composer install
   ```

3. **Install Node dependencies**
   ```sh
   npm install
   ```

4. **Copy the example environment file and set up your environment variables**
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure your database in `.env`**

6. **Run migrations**
   ```sh
   php artisan migrate
   ```

7. **Build frontend assets**
   ```sh
   npm run build
   ```

8. **Serve the application**
   ```sh
   php artisan serve
   ```
   
## Folder Structure

```
Momenty/
├── app/                # Application core (models, controllers, mail, etc.)
├── bootstrap/          # Laravel bootstrap files
├── config/             # Configuration files
├── database/           # Migrations, factories, seeders
├── public/             # Publicly accessible files (index.php, assets)
├── resources/
│   ├── views/          # Blade templates
│   ├── js/             # JavaScript source
│   └── sass/           # SCSS/CSS source (Bootstrap customizations)
├── routes/             # Route definitions (web.php, api.php)
├── storage/            # Logs, compiled files, file uploads
├── .env.example        # Example environment file
├── artisan             # Laravel CLI
├── composer.json       # PHP dependencies
└── package.json        # Node dependencies
```
