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
            <h3>* History *</h3>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <a href="new.php"><button class="btn btn-dark btn-lg btn-block">New Quest</button></a>
        </div>

        <div class="col">
            <a href="index.php"><button class="btn btn-dark btn-lg btn-block">Home</button></a>
        </div>

        <div class="col">
            <a href="logout.php"><button class="btn btn-dark btn-lg btn-block">Logout</button></a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <?php
            $myQuests->showHistory();
            ?>
        </div>
    </div>

    <br>
    <br>






</div>
</body>
</html>