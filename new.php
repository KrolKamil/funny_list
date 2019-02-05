<?php
require_once 'includes/init.php';

$myRedirect = new Redirect();
$myRedirect->unlogedUser();

$myQuest = new Quests();
$myQuest->createQuest();
?>

<!DOCTYPE html>
<html>
<?php include 'views\header.php'; ?>
<body>

<div class="container">
    <h3>* Create New Quest *</h3>

    <br>

    <div class="row">
        <div class="col">
            <a href="index.php"><button class="btn btn-dark btn-lg btn-block">Home</button></a>
        </div>

        <div class="col">
            <a href="history.php"><button class="btn btn-dark btn-lg btn-block">History</button></a>
        </div>

        <div class="col">
            <a href="logout.php"><button class="btn btn-dark btn-lg btn-block">Logout</button></a>
        </div>
    </div>

    <br>

    <form action="new.php" method="post">

        <div class="form-group">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary btn-lg">
                    <input type="radio" name="mark" id="option1" value="film" autocomplete="off" /> Film
                </label>
                <label class="btn btn-secondary btn-lg ">
                    <input type="radio" name="mark" id="option2" value="quick" autocomplete="off"  /> Short
                </label>
                <label class="btn btn-secondary btn-lg">
                    <input type="radio" name="mark" id="option3" value="long" autocomplete="off" /> Long
                </label>
            </div>
        </div>



        <div class="form-group ">
            <input class="form-control form-control-lg"  type="text" name="data" id="data" placeholder="Fill Me Babe" required>
        </div>



        <button class="btn btn-lg btn-dark  type="submit">Send</button>




    </form>

</div>



</body>
</html>