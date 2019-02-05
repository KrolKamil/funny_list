<?php

require_once 'includes/init.php';

$myRedirect = new Redirect();
$myRedirect->unlogedUser();

$mySession = new Session();
$mySession->logout();