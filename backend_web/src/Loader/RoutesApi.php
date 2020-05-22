<?php
// src/Repository/UserRepository.php
declare(strict_types=1);

namespace App\Loader;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class RoutesApi extends Loader
{
    /**
     * @param mixed $resource
     * @param string|null $type     The resource type or null if unknown
     * @return RouteCollection
     */
    public function load($resource, $type = null)
    {
        $routes = new RouteCollection();

        $thisdir = __DIR__."/../..";
        $resource = "$thisdir/config/routes/api/routes_api.yaml";
        $type = 'yaml';

        $importedRoutes = $this->import($resource, $type);
        $routes->addCollection($importedRoutes);

        return $routes;
    }

    public function supports($resource, $type = null)
    {
        return 'routes_api' === $type;
    }
}