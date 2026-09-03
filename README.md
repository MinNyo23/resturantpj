# RollingStone Restaurant

RollingStone is a PHP/MySQL restaurant ordering application with a customer-facing menu, authentication, cart, checkout, order confirmation, and an admin area for managing products and orders.

## What was improved

The customer experience now has a focused landing page, a responsive data-driven menu, category filters, pagination, search, stock visibility, a clearer cart, a shorter checkout form, and a readable order confirmation receipt. Authentication now uses `password_hash()` and `password_verify()` with a one-time compatibility path for the legacy MD5 values in the original SQL dump. Customer-facing queries use prepared statements, cart endpoints validate IDs and inventory, and checkout uses a transaction that rechecks stock and decrements inventory only after the order details are saved.

## Requirements

Use PHP 8.0+ with the `mysqli` extension and MySQL/MariaDB. The application still has local-development defaults, but production deployments should provide database settings through environment variables:

```text
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=restaurant
DB_USER=your_database_user
DB_PASSWORD=your_database_password
```

## Setup

Create the database and import [`New SQL File is here! 18th jan 2021/restaurant.sql`]("New SQL File is here! 18th jan 2021/restaurant.sql"). On an existing installation, run both SQL migrations in `database/migrations/` in filename order. The first migration expands the password column for modern hashes; the second lets pending orders keep `senddate` empty until an admin dispatches them.

From the project directory, start the development server with:

```bash
php -S 127.0.0.1:8080
```

Then open `http://127.0.0.1:8080/home.php` in a browser. Sign in with an existing account or create a new customer account, browse the menu, add items to the cart, and place a cash-on-delivery test order.

## Important notes

Payment processing is intentionally not implemented. Checkout currently collects delivery details and offers cash on delivery without storing card information. A payment provider can be added later as a separate integration. The original SQL dump contains sample users and legacy MD5 hashes; change or remove sample credentials before deploying publicly.

## Verification

The project was checked with `php -l` across all PHP files and `git diff --check`. A local MariaDB smoke test verified the homepage, menu, search, guest cart protection, legacy-password login migration, add-to-cart, checkout, order confirmation, transactional order detail creation, and inventory reduction.
