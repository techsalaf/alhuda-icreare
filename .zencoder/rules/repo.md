---
description: Repository Information Overview
alwaysApply: true
---

# Al-Huda Info Creare Information

## Summary
Al-Huda Info Creare is a modular Laravel-based content management system (CMS) with features for blog posts, pages, user management, media galleries, and more. It uses a modular architecture with separate components for different functionalities.

## Structure
- **app/**: Core application code
- **bootstrap/**: Laravel bootstrap files
- **config/**: Configuration files
- **database/**: Database migrations and seeders
- **Modules/**: Modular components (Blog, User, Post, Page, etc.)
- **public/**: Publicly accessible files
- **resources/**: Frontend resources (views, assets)
- **routes/**: Application routes
- **storage/**: File storage
- **tests/**: Test files
- **vendor/**: Dependencies

## Language & Runtime
**Language**: PHP
**Version**: ^7.3|^8.0
**Framework**: Laravel 6.8/8.83.2
**Build System**: Composer
**Package Manager**: Composer (PHP), NPM (JavaScript)

## Dependencies
**Main PHP Dependencies**:
- laravel/framework (^6.0|^v8.83.2)
- nwidart/laravel-modules (^5.1)
- cartalyst/sentinel (^3.0|^5.1)
- intervention/image (^2.7)
- tymon/jwt-auth (^1.0@dev)
- spatie/laravel-sitemap (^5.8|^6.2)
- mcamara/laravel-localization (^1.8)

**JavaScript Dependencies**:
- axios (^0.19)
- cross-env (^5.1)
- laravel-mix (^4.0.7)
- sass (^1.15.2)

## Build & Installation
```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Build assets
npm run dev

# Run migrations
php artisan migrate

# Generate application key
php artisan key:generate
```

## Modules
The application is built with a modular architecture using nwidart/laravel-modules:

- **Ads**: Advertisement management
- **Api**: API endpoints
- **Appearance**: Theme and appearance settings
- **Blog**: Blog functionality
- **Contact**: Contact forms and management
- **Gallery**: Media gallery
- **Language**: Multilingual support
- **Newsletter**: Newsletter management
- **Page**: Static page management
- **Post**: Content posting system
- **Setting**: Application settings
- **Social**: Social media integration
- **Tag**: Content tagging
- **User**: User management and authentication
- **Widget**: Widget management

## Testing
**Framework**: PHPUnit
**Test Location**: tests/ directory
**Configuration**: phpunit.xml
**Run Command**:
```bash
php artisan test
# or
vendor/bin/phpunit
```

## Database
**Connection**: MySQL
**Configuration**: Configured in .env file
**Migrations**: Located in database/migrations and Modules/*/Database/Migrations

## Frontend
**Asset Compilation**: Laravel Mix (Webpack)
**CSS Preprocessor**: SASS
**Build Command**:
```bash
npm run dev    # Development
npm run prod   # Production
```