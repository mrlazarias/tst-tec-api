# Places API

A simple RESTful API for managing places built with Laravel 12 and PostgreSQL.

## Overview

This API provides endpoints to create, read, update, and delete place records. Each place has a name, city, state, and an automatically generated slug.

## Requirements

- Docker
- Docker Compose

## Setup and Installation

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

## Running Tests

Run the test suite to ensure everything is working correctly:
```bash
docker-compose exec app php artisan test
```

## API Endpoints

The API is accessible at `http://localhost:8000/api`.

### Places

#### Get All Places
```
GET /api/places
```
Query parameters:
- `name` (optional): Filter places by name

#### Get a Specific Place
```
GET /api/places/{id}
```

#### Create a Place
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

#### Update a Place
```
PUT /api/places/{id}
```
Request body:
```json
{
    "name": "Updated Place Name",
    "city": "Updated City Name",
    "state": "Updated State Name"
}
```

#### Delete a Place
```
DELETE /api/places/{id}
```

## Database Access

The PostgreSQL database can be accessed through pgAdmin at `http://localhost:5050`:
- Email: admin@admin.com
- Password: admin

For direct database connection:
- Host: localhost
- Port: 5432
- Database: places_db
- Username: places_user
- Password: places_password

## Project Structure

The project follows clean code principles and is organized using the standard Laravel directory structure:

- `app/Models/Place.php`: The Place model with automatic slug generation
- `app/Http/Controllers/Api/PlaceController.php`: Controller with CRUD operations
- `database/migrations/`: Database migrations
- `routes/api.php`: API route definitions
- `tests/Feature/Api/PlaceControllerTest.php`: Feature tests for the API endpoints

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
