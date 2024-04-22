<?php
class Routes
{
    private $routes = [];

    // Add a route mapping
    public function addRoute($method, $path, $controller, $action)
    {
        $this->routes[$method][$path] = array('controller' => $controller, 'action' => $action);
    }

    // Handle the request
    public function handleRequest()
    {
        // Parse the request URI
        $requestUri = $_SERVER['REQUEST_URI'];
        $parts = explode('/', trim($requestUri, '/'));

        // Determine the HTTP method
        $method = $_SERVER['REQUEST_METHOD'];

        // Get the controller and action based on the route
        $path = '/' . $parts[2]; // Get the resource name from the URI
        $route = $this->routes[$method][$path];

        if (!$route) {
            http_response_code(404);
            echo json_encode(array('message' => 'Not Found'));
            exit;
        }

        // Instantiate the controller
        $controllerName = $route['controller'];
        require_once "$controllerName.php"; // Include the controller file
        $controller = new $controllerName();

        // Check if an ID is provided in the request URI
        $id = null;
        if (count($parts) > 3) {
            $id = $parts[3]; // Get the ID from the URI
        }

        switch ($method) {
            case 'GET':
                switch ($path) {
                    case '/courses':
                        if ($id !== null && method_exists($controller, 'getCourseByID')) {
                            // Fetch course by ID
                            call_user_func_array(array($controller, 'getCourseByID'), array($id));
                        } elseif (method_exists($controller, 'getAllCourses')) {
                            // Fetch all courses
                            call_user_func_array(array($controller, 'getAllCourses'), array());
                        } else {
                            // No appropriate action method found
                            http_response_code(404);
                            echo json_encode(array('message' => 'Not Found'));
                            exit;
                        }
                        break;
                    case '/categories':
                        if ($id !== null && method_exists($controller, 'getCategoryByID')) {
                            // Fetch category by ID
                            call_user_func_array(array($controller, 'getCategoryByID'), array($id));
                        } elseif (method_exists($controller, 'getAllCategories')) {
                            // Fetch all categories
                            call_user_func_array(array($controller, 'getAllCategories'), array());
                        } else {
                            // No appropriate action method found
                            http_response_code(404);
                            echo json_encode(array('message' => 'Not Found'));
                            exit;
                        }
                        break;
                    default:
                        // Path not recognized
                        http_response_code(404);
                        echo json_encode(array('message' => 'Not Found'));
                        exit;
                }
                break;
            default:
                // Method not supported
                http_response_code(405);
                echo json_encode(array('message' => 'Method Not Allowed'));
                exit;
        }
    }
}
