<?php

require_once 'includes/init.php';

$myRedirect = new Redirect();
$myRedirect->unlogedUser();

$myQuests = new Quests();

$myQuests->moveQuest();

$myRedirect->logedUser();
