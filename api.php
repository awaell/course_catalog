<?php 
require_once('config/config.php');
require_once('config/database.php');
require_once('controller/Routes.php');
require_once('model/Model.php');
require_once('controller/CoursesController.php');

// Instantiate the routes
$router = new Routes();

// Add routes for courses and categories endpoints
$router->addRoute('GET', '/courses', 'CoursesController', 'getAllCourses');
$router->addRoute('GET', '/courses/:id', 'CoursesController', 'getCourseByID');
$router->addRoute('GET', '/categories', 'CategoriesController', 'getAllCategories');
$router->addRoute('GET', '/categories/:id', 'CategoriesController', 'getCategoryByID');

// Handle the request
$router->handleRequest();