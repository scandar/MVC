<?php

/**
 *
 */
class Bootstrap
{
    function __construct()
    {
        $url = $this->explodeURL();

        if ($this->requireController($url))
            $this->handleParams($url);
    }

    /**
     *  @desc requires controller if exists
     *  @param $url array containing controller, function, and argumnts names
     *  @return bool
     */
    private function requireController($url)
    {
        if (isset($url[0])) {
            $file = 'controllers/' .$url[0]. 'Controller.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }

            // if doesn't exists require error controller and return false
            require 'controllers/errorController.php';
            new Err();
            return false;
        }
    }

    /**
     *  @desc handles extra parameters passed to the controller (methods and argumnts)
     *  @param $url array containing controller, function, and argumnts names
     */
    private function handleParams($url)
    {
        $controller = new $url[0];
        if (isset($url[1])) {
            $arg = (isset($url[2])) ? $url[2] : null;
            $controller->{$url[1]}($arg);
        }
    }

    /**
     *  @desc trims extra slashes and explodes the url into an array
     *  @return $url
     */
    private function explodeURL()
    {
        if (isset($_GET['url'])) {
            // trim excess slashes
            $url = rtrim($_GET['url'], '/');
            // explode url to array
            $url = explode('/',$url);
            return $url;
        }
    }
}
