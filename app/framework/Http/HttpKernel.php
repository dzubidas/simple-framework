<?php

namespace dockerphp\framework\Http;

use dockerphp\framework\Http\Request;
use dockerphp\framework\Http\Response;
use FastRoute\Dispatcher;
use App\controller\HomeController;
use function FastRoute\simpleDispatcher;
use FastRoute\RouteCollector;

class HttpKernel {

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request) {
        /**
         * @param \FastRoute\RouteCollector $route_collector
         */
        $dispatcher = simpleDispatcher(function(RouteCollector $route_collector) {
            $routes = include BASE_PATH. '/routes/web.php';

            foreach ($routes as $route) {
                $route_collector->addRoute(...$route);
            }
        });
    
        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(), 
            $request->getPath(),
        );
        [$status,[$controller, $method], $vars] = $routeInfo;

        if ($request->getMethod() === 'POST') {
            // Add the $request object to the $vars array for POST requests
            $vars['request'] = $request;
        }
    
        $response = call_user_func_array([new $controller, $method], $vars);
    
        return $response;
    }
}