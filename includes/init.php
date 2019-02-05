<?php

session_start();

spl_autoload_register(

function($class_name)
{
	require_once $class_name . '.php';
}

);