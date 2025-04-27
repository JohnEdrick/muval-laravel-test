Refactor registration and task management functionality

-   Updated the registration view path from 'register' to 'register.form'.
-   Optimized TaskController:
    -   Used eager loading for user data in the index method.
    -   Enhanced create method to pass all users to the view.
    -   Improved store method with request validation and streamlined task creation.
    -   Updated edit method to use route model binding for tasks.
    -   Enhanced update method with request validation and streamlined task update.
    -   Simplified destroy method using route model binding.
-   Updated Task model to explicitly define the table name and improved fillable attributes format.
-   Refined User model to include a relationship with tasks.
-   Updated DatabaseSeeder to hash the password for the test user.
-   Enhanced index view for tasks with improved action links and form handling.
-   Improved create and edit views for tasks with better user feedback and validation error display.
-   Updated routes to use named routes for better readability and maintainability.
