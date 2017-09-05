<?php
/**
 *
 */
class Controller
{
    protected $model;
    // protected $view;

    function __construct()
    {
        // echo "Main controller<br>";
        $this->view = new View();
        // $this->loadModel();
        // $this->index();
    }

    public function index()
    {
        $this->view->render(strtolower(get_class($this)) .'/index');
        // echo "index method";
    }

    public function loadModel()
    {
        $clsname = get_class($this);
        $path = 'models/' . strtolower($clsname) . '_model.php';

        // requires class model if exists
        if (file_exists($path))
        {
            require $path;
            $modname = ucfirst($clsname) . '_Model';
            $this->model = new $modname();
        }
    }
}
