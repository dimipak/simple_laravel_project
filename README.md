# Project Installation

First of all clone this project to a folder and then execute the commands below inside that folder in the correct order

1. Install composer dependencies:
    ```
   docker run --rm \
   -u "$(id -u):$(id -g)" \
   -v "$(pwd):/var/www/html" \
   -w /var/www/html \
   laravelsail/php83-composer:latest \
   composer install --ignore-platform-reqs
   ```
2. Start docker compose services:
    ```
    ./vendor/bin/sail up 
    ```
3. Migrate database:
    ```
    ./vendor/bin/sail artisan migrate   
    ```
4. Migrate test database:
    ```
    ./vendor/bin/sail artisan migrate --env=testing
    ```
5. Run tests:
    ```
    ./vendor/bin/sail artisan test   
    ```

# Run endpoint

Before running the requested endpoint make sure to start the supervisor. Open an other terminal navigate to the folder 
of the project and run the bellow command
```
./vendor/bin/sail artisan queue:work 
```

POST:
```
localhost/api/submission
```
Request body:
```
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}
```
In order to see the log message, open the laravel.log inside storage/logs/laravel.log
