<?php

class Redirect
{
    public function unlogedUser()
    {
        if(!isset($_SESSION['id']))
        {
            header("Location: index.php");
            die();
        }
    }

    public function logedUser()
    {
        if(isset($_SESSION['id']))
        {
            header("Location: list.php");
            die();
        }
    }
}