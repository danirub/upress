<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Features 

- **Public Post Viewing**: All users, including guests, can view the posts.
- **User Authentication**: Only authenticated users can create, edit, and delete their own posts.
- **CRUD Operations**: Users can create, read, update, and delete posts.
- **Authorization**: Users can only modify their own posts.
- **Responsive UI**: Simple user interface for managing posts, based on Laravel Blade templates.
- **Apple News**: A simple controller that fetches Apple news.


### Key Enhancements:
1. **Corrected Typo**: Changed "Aplle news" to **Apple News** for consistency.
2. **Code Blocks**: Improved the visibility of commands using Markdown's code block feature.

You can copy this revised version into your Markdown file.


## Laravel Daily News Fetch Command Without Cron

This Laravel project fetches news from the News API once a day and stores it in the database using a custom Artisan command. The scheduler is triggered through web requests instead of a cron job, ensuring the task runs daily without setting up a server-side cron job.

## Prerequisites

1. Laravel 8+ installed on your server.
2. An API key from [NewsAPI](https://newsapi.org/).
3. Database migration for the `news` table, which stores the fetched articles.

## Setup Instructions

### 1. Create the `fetch:news` Command

Run the following command to generate a new Artisan command:

```bash
php artisan make:command FetchNews
