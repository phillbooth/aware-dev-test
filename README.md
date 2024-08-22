### **Laravel Joke Management Application**

#### **Project Brief**

**Overview:** The aim of this task is to create a Laravel application that will retrieve data from an external API source, store it, allow for manipulation, and display it on the frontend.

**API Source:** [icanhazdadjoke.com](https://icanhazdadjoke.com/)

**Requirements:**

-   Collect data from the external API.
-   Store the API responses in the database.
-   Display the stored jokes on the frontend of the application.
-   Implement CRUD (Create, Read, Update, Delete) functionality for the stored jokes.
-   Implement authentication to restrict access to the CRUD operations to authenticated users.

**Bonus Points:**

-   Add any additional features to demonstrate PHP/Laravel knowledge.

* * * * *

#### **File Structure**

-   **app/Http/Controllers/Web/JokesController.php**

    -   Handles web requests for displaying jokes in a user-friendly format.
-   **app/Http/Controllers/Api/JokeApiController.php**

    -   Handles API requests for managing jokes via JSON responses.
-   **app/Models/Joke.php**

    -   The model representing the Joke entity, including relationships and scopes.
-   **app/Services/JokeService.php**

    -   Contains the business logic for interacting with the external API and managing jokes.
-   **app/Providers/JokeServiceProvider.php**

    -   Registers the `JokeService` in the Laravel service container.
-   **app/Console/Commands/FetchJokes.php**

    -   Command to fetch and store jokes from the API, scheduled to run periodically.
-   **routes/web.php**

    -   Defines web routes for managing jokes and handling user authentication.
-   **routes/api.php**

    -   Defines API routes, including authentication via Sanctum and handling undefined routes.
-   **resources/views/jokes/index.blade.php**

    -   Contains the Blade template for rendering the jokes on the frontend.
-   **database/migrations/**

    -   Contains migration files to set up the database schema, including tables for users and jokes.

* * * * *

#### **Test Structure**

-   **tests/Unit/Services/JokeServiceTest.php**

    -   Unit tests for `JokeService`, verifying that jokes are correctly fetched from the API and stored in the database.
-   **tests/Feature/JokeTest.php**

    -   Feature tests for the Joke API, ensuring that authenticated users can perform CRUD operations on jokes.
-   **tests/Feature/DatabaseConnectionTest.php**

    -   Verifies that the application can successfully connect to the database.
-   **tests/Feature/SecurityTest.php**

    -   Tests rate limiting and login security features to ensure the application handles these aspects properly.
-   **tests/Feature/SmokeTest.php**

    -   Basic smoke tests to ensure that key pages and routes load correctly.

* * * * *

### **Web and API Paths**

#### **Web Routes (`web.php`):**

These routes handle user-facing pages and HTML responses. They typically include routes for displaying the homepage, handling authentication (login, registration), and other UI elements.

-   **Example:** `GET /jokes` will display jokes in a user-friendly format using a Blade template.

#### **API Routes (`api.php`):**

These routes are designed for programmatic access, returning JSON responses. They are protected by `auth:sanctum`, requiring a valid token for access.

-   **Example:** `GET /api/jokes` will return a JSON list of jokes.

### **Login and API Access**

#### **Web Login:**

The login form at `/login` handles user authentication using session-based authentication. Once logged in, users can access protected web routes like `/jokes`.

#### **API Authentication:**

API routes use Laravel Sanctum for token-based authentication. When a user logs in via the API, they receive a token that must be sent with each API request, typically in the Authorization header.

#### **Using Postman for API Testing:**

1.  **Obtain an API Token:**

    -   Make a POST request to `/api/login` with the user's email and password to obtain an API token.
    -   Example request:

POST /api/login { "email": "user@example.com", "password": "password" }


-   -   The response will include a token, e.g., `token: "your-token-here"`.-   **Access API Routes:**

    -   Include the token in the Authorization header as a Bearer token for subsequent API requests.
    -   Example of a GET request to fetch jokes:

GET /api/jokes Authorization: Bearer your-token-here

2.  **Test Other Endpoints:**

    -   Use similar requests in Postman to test other API endpoints like creating, updating, and deleting jokes.

* * * * *

### **Installation and Setup**

1.  **Clone the Repository:**

    -   Clone the repository to your local machine.
2.  **Install Composer Dependencies:**

    -   Run `composer install` to install PHP dependencies.
3.  **Install NPM Dependencies:**

    -   Run `npm install` to install frontend dependencies.
    -   Run `npm run dev` to compile assets.
4.  **Environment Setup:**

    -   Create a `.env` file by copying the `.env.example`.
    -   Set up your database credentials in the `.env` file.
    -   Create a `.env.testing` file for testing purposes, mirroring the `.env` file with the appropriate test database settings.
5.  **Run Migrations:**

    -   Run `php artisan migrate` to set up the database schema.
    -   Run `php artisan migrate --env=testing` to set up the test database schema.
6.  **Run Tests:**

    -   Use `php artisan test` to run all tests.
7.  **Clear Cache (if necessary):**

    -   To clear all caches, run `php artisan optimize:clear`.
8.  **Run the Application:**

    -   Start the development server using `php artisan serve`.


9.   **Get a joke:**

    - cmd line run: php artisan jokes:fetch

10. Visit the homepage and Creat an account and you will be take to /jokes to see the listed jokes in the database