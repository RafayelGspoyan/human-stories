<?php

class Router
{
  private $routes;
  private $count = 0;
  public function __construct()
  {
    $routesPath = ROOT . '/config/routes.php';
    $this->routes = require $routesPath;
  }

  private function getURI()
  {
      if (!empty($_SERVER["REQUEST_URI"])) {
          return $uri = trim($_SERVER["REQUEST_URI"], '/');
      }
  }

  public function run()
  {
      $uri = $this->getURI();

      foreach ($this->routes as $uriPattern => $path) {

          if (preg_match("#^$uriPattern$#", $uri)) {
              $internalRoute = preg_replace("#^$uriPattern$#", $path, $uri);
              $segments = explode('/', $internalRoute);

              $controllerName = array_shift($segments) . 'Controller';
              $controllerName = ucfirst($controllerName);

              $actionName = 'action' . ucfirst(array_shift($segments));
              $parameters = $segments;

              $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

              if (file_exists($controllerFile)) {
                  require_once($controllerFile);
              }

              $controllerObject = new $controllerName;
              $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
              $this->count++;
              break;
          }
      }

  }
}