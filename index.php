<?php

include 'config/Constants.php';

spl_autoload_register(function ($class)
{
    include "libs/$class.php";
});

$app = new Bootstrap();

// $db = new Database();
// $db->query('select','users',['id'=>1]);

// $2y$10$J4TzstNzsGp1LgWzvuQhju1GzMtu501GJoqb4fMU.tTOkAhVlgMwS
