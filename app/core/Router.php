<?php

class Router
{
    protected $routes = [];

    public function add($method, $uri, $action)
    {
        $method = strtoupper($method);
        $uri = '/' . trim($uri, '/'); // Normalize URI
        $uri = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $uri); // Convert {id} to regex
        $this->routes[$method][$uri] = $action;
    }

    // Dispatch a request
    public function dispatch($uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        //$uri = str_replace(BASE_PATH, '', parse_url($uri, PHP_URL_PATH));
        //$uri = '/' . trim($uri, '/'); // Normalize URI

        if (strpos($uri, BASE_PATH) === 0) {
            $uri = substr($uri, strlen(BASE_PATH));
        }
        $uri = '/' . trim(parse_url($uri, PHP_URL_PATH), '/'); // Normalize URI

        if (!isset($this->routes[$method])) {
            http_response_code(404);
            echo '404 - Not Found';
            return;
        }

        /* Debug
        echo "Requested URI: " . $uri . "<br>";
        echo "Available Routes: <pre>";
        print_r($this->routes);
        echo "</pre>"; */

        foreach ($this->routes[$method] as $route => $action) {
            $pattern = '#^' . $route . '$#';

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Remove the full match so only {id} is in matches array

                list($controllerName, $methodName) = explode('@', $action);
                
                $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';
                if (!file_exists($controllerPath)) {
                    http_response_code(500);
                    echo "Controller file not found: $controllerPath";
                    exit;
                }

                require_once $controllerPath;

                $controller = new $controllerName();
                if (!method_exists($controller, $methodName)) {
                    http_response_code(500);
                    echo "Method $methodName not found in controller $controllerName";
                    exit;
                }

                $_SESSION['controller'] = $controllerName; // Store the controller name in session

                $controller->$methodName(...$matches); // Pass dynamic parameters to the method
                
                return;
            }
        }

        // Route not found
        http_response_code(404);
        echo '404 - Not Found';
    }
}

?>