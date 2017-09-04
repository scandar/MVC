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
        //  load home controller if no controller specified
        if (empty($url[0])) {
            require 'controllers/homeController.php';
            $home = new Home();
            $home->index();
            return false;
        }

        //  load controller if specified
        if (isset($url[0])) {
            $file = 'controllers/' .$url[0]. 'Controller.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }

            // if doesn't exists require error controller and return false
            $this->notFound();
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
            if (method_exists($controller, $url[1])) {
                $arg = (isset($url[2])) ? $url[2] : null;
                $controller->{$url[1]}($arg);
                return true;
            }
            else
            {
                $this->notFound();
                return false;
            }
        }
        //if no methods specified load the default
        $controller->index();
        return true;
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
        return $url = null;
    }

    public function notFound()
    {
        require 'controllers/errorController.php';
        $err = new Err();
        // $err->index();
    }
}
