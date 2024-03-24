# Maven Ecommerce Project

Welcome to the Maven Ecommerce Project repository! This project aims to develop a comprehensive ecommerce website for a fictional ski goods retailer.

<img src="./public/images/maven-high-resolution-color-logo.png" width="400" height="300">

## Project Overview

- **Objective:** Develop a user-friendly platform for online purchase of ski equipment and related products.
- **Business Domain:** Focused on the ski industry, catering to both casual and avid skiers.
- **Scope:** Fully functional ecommerce website with features like user account management, product browsing, secure checkout, and order tracking.
- **Target Audience:** Skiing enthusiasts of all levels.

## Technology Stack

- **Backend Framework:** Laravel
- **Version Control:** Git
- **Task Tracking Tool:** Trello <!-- (Board Link: Trello Board) -->

## Project Management

- **Software Engineering Process:** Agile methodology.
- **Task and Project Tracking:** Trello for comprehensive task management and progress tracking.

## Getting Started

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/EddiePoulter/Ecom-Maven.git
   ```
2. Install Composer packages and enable the required extensions within the php folder i.e. sqlite
   ```sh
   composer install
   ```
3. Copy the environment file & edit it accordingly
   ```sh
   cp .env.example .env
   ```
4. Ensure that the `DB_CONNECTION` in your `.env` file is set to `sqlite`.
   
   Create an empty database file. You can do this manually or by running:
   ```sh
   touch database/database.sqlite
   ```
5. Generate application key
   ```sh
   php artisan key:generate
   ```
6. Create Database then migrate and seed
   ```sh
   php artisan migrate --seed
   ```
7. Linking Storage folder to public
   ```sh
   php artisan storage:link
   ```
8. Serve the application
   ```sh
   php artisan serve
   ```

## Running Tests

Laravel is built with testing in mind. In fact, support for testing with PHPUnit is included out of the box, and a `phpunit.xml` file is already set up for your application.

### Running all tests

You may run all of the tests for your application using the `test` Artisan command.

```sh
php artisan test
```

### Running Unit Tests

Unit tests are typically run in isolation from your application and its dependencies. When running unit tests, Laravel won’t load your database or other services. Here’s how you can run them:

```sh
php artisan test --filter Unit
```

### Running Integration Tests

Integration tests provide a way to test your application’s “integration” with its environment and third-party services. Here’s how you can run them:

```sh
php artisan test --filter Integration
```

Remember to replace `Unit` and `Integration` with the actual names of your test classes.

For more information, please refer to the Laravel testing documentation.

## Contributing

We welcome contributions! If you would like to contribute to the project, please follow our Contribution Guidelines.

## License

This project is licensed under the [License Name] - see the LICENSE.md file for details. -->

Happy coding!
