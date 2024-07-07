<?php

class Router
{
    private $routes;
    private $baseFolder;

    public function __construct($routes, $baseFolder = '/site-imperio2')
    {
        $this->routes = $routes;
        $this->baseFolder = $baseFolder;
    }

    public function handleRequest()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestUri = rtrim($requestUri, '/');

        // Remove base folder from URI
        if (strpos($requestUri, $this->baseFolder) === 0) {
            $requestUri = substr($requestUri, strlen($this->baseFolder));
        }

        if ($requestUri === '') {
            $requestUri = '/';
        }

        $foundRoute = false;

        foreach ($this->routes as $route => $controllerAction) {
            $routePattern = preg_replace('/\{[a-zA-Z]+\}/', '([a-zA-Z0-9-_]+)', $route);
            $routePattern = str_replace('/', '\/', $routePattern);
            if (preg_match('/^' . $routePattern . '$/', $requestUri, $matches)) {
                $foundRoute = true;
                array_shift($matches); // Remove a primeira correspondência, que é a string completa

                $routeParts = explode('@', $controllerAction);
                $controllerName = $routeParts[0];
                $methodName = $routeParts[1];

                if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
                    $controller = new $controllerName();
                    call_user_func_array([$controller, $methodName], $matches);
                } else {
                    http_response_code(404);
                    require_once __DIR__ . '/../views/not-found.php';
                }
                break;
            }
        }

        if (!$foundRoute) {
            http_response_code(404);
            require_once __DIR__ . '/../views/not-found.php';
        }
    }
}
