<?php
namespace Http;

class Router
{
    static public function parse($url, Request $request)
    {
        $explode_url = explode('/', $url);
        $explode_url = array_slice($explode_url, 1);
        $request->setController($explode_url[0]);
        $request->setAction($explode_url[1]);
        $request->setParams(array_slice($explode_url, 1));
    }

    static public function pageNotFound()
    {
        http_response_code(404);
        die();
    }
}