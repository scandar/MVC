<?php
/**
 *
 */
class Controller
{

    function __construct()
    {
        // echo "Main controller<br>";
        $this->view = new View();
        // $this->index();
    }

    public function index()
    {
        $this->view->render(strtolower(get_class($this)) .'/index');
        // echo "index method";
    }
}
