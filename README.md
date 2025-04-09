# 📍 Places API

A RESTful API for managing places, built with Laravel 12 and PostgreSQL.

## 🚀 Features

- ✅ **Create** new places
- 🔄 **Update** place information
- 🔍 **Retrieve** specific places
- 📋 **List** all places
- 🔎 **Filter** places by name
- 🧪 **100% test coverage** on application classes

## 🧰 Technologies

- **Laravel 12** - Modern PHP framework
- **PostgreSQL** - Relational database
- **Docker** - Development and production environment
- **PHPUnit** - Testing framework

## 📋 Data Structure

Each place has the following attributes:

| Attribute  | Description                                     |
|------------|-------------------------------------------------|
| `name`     | Name of the place                               |
| `slug`     | URL-friendly version (automatically generated)  |
| `city`     | City where the place is located                 |
| `state`    | State where the place is located                |
| `created_at` | Date and time when the record was created     |
| `updated_at` | Date and time of the last update              |

## 🛠️ Setup and Installation

### Prerequisites

- Docker
- Docker Compose

### Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <repository-directory>
   ```

2. Start the Docker containers:
   ```bash
   docker-compose up -d
   ```

3. Install dependencies:
   ```bash
   docker-compose exec app composer install
   ```

4. Generate application key:
   ```bash
   docker-compose exec app php artisan key:generate
   ```

5. Run migrations:
   ```bash
   docker-compose exec app php artisan migrate
   ```

6. The API will be available at `http://localhost:8000/api`

## 🧪 Running Tests

Run the test suite to ensure everything is working correctly:

```bash
docker-compose exec app php artisan test
```

For generating a coverage report (Xdebug required):

```bash
docker-compose exec app php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html coverage
```

## 📡 API Endpoints

### List Places
```
GET /api/places
```
Optional query parameters:
- `name` - Filter places by name

### Get a Specific Place
```
GET /api/places/{id}
```

### Create a Place
```
POST /api/places
```
Request body:
```json
{
    "name": "Place Name",
    "city": "City Name",
    "state": "State Name"
}
```

### Update a Place
```
PUT /api/places/{id}
```
Request body:
```json
{
    "name": "Updated Name",
    "city": "Updated City",
    "state": "Updated State"
}
```

### Delete a Place
```
DELETE /api/places/{id}
```

## 🗄️ Database Access

### PostgreSQL
- **Host**: localhost
- **Port**: 5432
- **Database**: places_db
- **Username**: places_user
- **Password**: places_password

### pgAdmin (PostgreSQL Web Interface)
- **URL**: http://localhost:5050
- **Email**: admin@admin.com
- **Password**: admin
