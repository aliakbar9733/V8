<?php
/**
 * @copyright Aliakbar Soleimani 2020
 * Class ServiceProviderBootstrap
 * Bootstrap Files
 */

namespace Core;

use Illuminate\{Http\Request, Routing\Redirector, Routing\Router, Routing\UrlGenerator};
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ServiceProviderBootstrap
 * @package Core
 */
final class ServiceProviderBootstrap
{

    private function getServiceList()
    {
        return config("services");
    }

    private function autoload($provider)
    {
        require_once BASEDIR . "/app/Providers/" . $provider . ".php";
    }

    private function initialize()
    {
        foreach ($this->getServiceList() as $service) {
            $this->autoload($service);
        }
        return $this;
    }

    public static function run()
    {
        return (new self)->initialize();
    }

    public function invoke(Request $request, Router $router)
    {
        new Redirector(
            new UrlGenerator($router->getRoutes(), $request)
        );
        try {
            $response = $router->dispatch($request);
            $response->send();
        } catch (NotFoundHttpException $exception) {
            http_response_code(404);
            echo 404;
        }

    }
}