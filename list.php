<?php
require_once 'includes/init.php';

$myRedirect = new Redirect();
$myRedirect->unlogedUser();

$myQuests = new Quests();

?>

<!DOCTYPE html>
<html>
<?php include 'views\header.php'; ?>
<body>

<div class="container">

    <div class="row">
        <div class="col">
            <h3>* Funny List *</h3>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <a href="new.php"><button class="btn btn-dark btn-lg btn-block">New Quest</button></a>
        </div>

        <div class="col">
            <a href="history.php"><button class="btn btn-dark btn-lg btn-block">History</button></a>
        </div>

        <div class="col">
            <a href="logout.php"><button class="btn btn-dark btn-lg btn-block">Logout</button></a>
        </div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col">
            <div class="p-3 mb-2 bg-light text-dark">
                FILMS
            </div>
            <?php $myQuests->showQuests('film'); ?>
        </div>
        <div class="col">
            <div class="p-3 mb-2 bg-light text-dark">
                SHORT TERM
            </div>
            <?php $myQuests->showQuests('quick'); ?>
        </div>
        <div class="col">
            <div class="p-3 mb-2 bg-light text-dark">
                LONG TERM
            </div>
            <?php $myQuests->showQuests('long'); ?>
        </div>
    </div>




</div>
</body>
</html>