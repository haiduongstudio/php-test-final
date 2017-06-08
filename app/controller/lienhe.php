<?php

/**
 *
 */
require 'app/model/database.php';
class lienhe extends database
{

    public function index()
    {
        require 'view/modules/lienhe.php';
    }
}