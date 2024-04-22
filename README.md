## Course Catalog Structure

### Overview
The Course Catalog application is developed using PHP native, Bootstrap 5, jQuery, and Ajax technologies. It allows users to explore courses and categories dynamically fetched from a REST API.

### Directory Structure
1. **.github/workflow**: Contains CI/CD pipeline configurations for deploying code updates locally and remotely using the Samkirkland/FTP-Deploy-Action@4.3.0 action.
2. **/assets**: Includes JavaScript and CSS files:
   - **app.js**: Contains Ajax scripts for dynamically fetching data from the REST API and creating DOM elements.
   - **custom.css**: Contains custom styles to match the design requirements.
3. **/config**: Holds configuration files:
   - **config.php**: Defines the base URL for the application to ensure scalability.
   - **database.php**: Contains database connection configurations.
4. **/controller**: Contains PHP controllers:
   - **BaseController.php**: Maps JSON-encoded results from other API controllers.
   - **CategoriesController.php**: Manages categories logic, extending the base controller.
   - **CoursesController.php**: Manages courses logic, extending the base controller.
   - **Routes.php**: Defines and dynamically routes URL endpoints to corresponding methods.
5. **/migration**: Contains the SQL file for the database schema.
6. **/model**: Holds PHP models:
   - **Model.php**: Provides minimal SQL queries for fetching data from tables and is dynamically extendable for future tables.
7. **/view**: Includes the user-facing frontend:
   - **index.php**: The main page for exploring categories and courses.
8. **api.php**: The main entry point for handling all defined routes, as specified in the `swagger.yaml` file. Example route: `http://YOUR_BASE_URL/api.php/courses`.

### Usage
Users can access the Course Catalog through the `index.php` file. The API endpoints defined in `api.php` allow fetching courses and categories data dynamically. 

The `.github/workflow` directory includes CI/CD configurations for automated deployment. 

### Dependencies
The application relies on PHP, Bootstrap 5, jQuery, and Ajax technologies. Ensure that these dependencies are properly configured and available for the application to run smoothly.

### Deployment
Deploy the application by configuring the `.github/workflow` CI/CD pipeline to automate code updates from the local repository to the remote repository. This pipeline uses the Samkirkland/FTP-Deploy-Action@4.3.0 action for deployment.

### Additional Notes
- Ensure proper configuration of the `config.php` file, especially the base URL, for scalability.
- Regularly update and maintain the SQL file in the `migration` directory to reflect changes in the database schema.

This README provides an overview of the Course Catalog structure, usage, and deployment instructions. For detailed implementation and customization, refer to the codebase and associated documentation.