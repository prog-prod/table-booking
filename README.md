# Restaurant Table Booking System

## Description
This is a **REST API** service for restaurant table booking, built with **Laravel**, **PostgreSQL**, and **Docker (Laravel Sail)**.

## Features
- **Create a booking** (checks table availability before confirming).
- **Retrieve bookings** (sorted by booking time).
- **Cancel a booking** (must be at least 2 hours before the reserved time).
- **Manage tables** (limited number of tables with specific seating capacity).

---

## 🔧 Installation and Setup

### 1️⃣ **Clone the Repository**
```sh
git clone https://github.com/your-username/restaurant-booking.git
cd restaurant-booking
cp .env.example .env

DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=restaurant
DB_USERNAME=user
DB_PASSWORD=password

./vendor/bin/sail up -d

composer install

./vendor/bin/sail artisan migrate --seed

./vendor/bin/sail artisan key:generate
```
API is now accessible at `http://localhost/api`.


### 2️⃣ **API Endpoints**

#### **Bookings**
- **Create a booking**
  - `POST /bookings`
  - Request Body: `{
    "table_id": 1,
    "customer_name": "John Doe",
    "customer_email": "john@example.com",
    "booking_time": "2025-03-07 19:00:00",
    "guest_count": 4
  }`
- **Retrieve bookings**
    - `GET /bookings`
    - Query Params: `?date=2025-03-07`
- **Cancel a booking**
   - `DELETE /bookings/{booking_id}`


#### **Or Import a file in Postman [booking-tables.postman_collection.json](booking-tables.postman_collection.json)**
