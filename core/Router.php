<?php

namespace App\Core;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public $authRoutes = [
        'GET' => [],
        'POST' => []
    ];

    public $adminRoutes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller, $auth = false, $admin = false)
    {
        $this->routes['GET'][$uri] = $controller;

        if ($auth) {
            if ($admin) {
                $this->adminRoutes['GET'][$uri] = $controller;
            }
            $this->authRoutes['GET'][$uri] = $controller;
        }
    }

    public function post($uri, $controller, $auth = false, $admin = false)
    {
        $this->routes['POST'][$uri] = $controller;

        if ($auth) {
            if ($admin) {
                $this->adminRoutes['POST'][$uri] = $controller;
            }
            $this->authRoutes['POST'][$uri] = $controller;
        }
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            if (array_key_exists($uri, $this->authRoutes[$requestType]) && ! $this->guard()) {
                return redirect('/login');
            } else if (array_key_exists($uri, $this->authRoutes[$requestType]) && $this->guard()) {
                if (array_key_exists($uri, $this->adminRoutes[$requestType]) && ! $this->adminGuard()) {
                    return redirect('/');
                }
            }

            $route = $this->routes[$requestType][$uri];
            $route = explode('@', $route);

            $selectedController = "\\App\\Controllers\\" . $route[0];
            $controller = new $selectedController;

            $requestType = $route[1];

            return $controller->$requestType();
        }
        return view('404'); // Returns 404 page if none of the if statements return true.
    }

    public function guard()
    {
        return $_SESSION['user'];
    }

    public function adminGuard()
    {
        if ($_SESSION['user']->role_id != '1') {
            return false;
        }
        return true;
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new \Exception("{$controller} does not respond to the {$action} action");
        }
        return $controller->$action();
    }
}