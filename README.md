# Electronic Programme Guide API

An EPG that can be consumed by various apps.

## Setup

1. Clone the project

```
git clone git@github.com:denizaygun/electronic-programming-guide.git
```
2. Enter the folder and install project dependencies
```
composer install
```

3. Copy the example environment file, setup a local database and poplulate the DB fields.
```
cp .env.example .env
```

4. Generate yourself an application key
```
php artisan key:generate
```

5. Run the database migrations (valid DB connection required)
```
php artisan migrate
```

6. Start the local development server
```
php artisan serve
```

7. (Optional) Utilise the [Postman collection](epg-api.postman_collection.json) provided in the project

## Testing

The project includes some unit and feature tests, you can run them with:
```
php artisan test
```
