<?php
namespace Http;

class Router
{
    /**
     * parse route and detect parameters
     * @param $url
     * @param Request $request
     */
    static public function parse($url, Request $request)
    {
        $urlParts = parse_url($url);

        $router = ROUTER[$urlParts['path']]?? false;

        if(!$router) {
            static::pageNotFound();
        }

        if (!in_array($_SERVER['REQUEST_METHOD'], $router['method'])) {
            static::methodNotAllowed();
        }

        $request->setController($router['controller']);
        $request->setAction($router['action']);

        //for the bright future
        $request->setParams([]);
    }

    /**
     * to 404 page
     */
    static public function pageNotFound()
    {
        http_response_code(404);
        header('Location: /404');
        die();
    }

    /**
     * to 405 page
     */
    static public function methodNotAllowed()
    {
        http_response_code(405);
        header('Location: /405');
        die();
    }
}