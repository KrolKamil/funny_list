<?php
require_once 'includes/init.php';

$myLogin = new Session();
$myLogin->loginUser();

$myRedirect = new Redirect();
$myRedirect->logedUser();
?>

<!DOCTYPE html>
<html>
<?php include 'views\header.php'; ?>
<body>

    <div class="container">
		<h3>Greetings Traveler</h3>

        <form action="index.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Password:</label>
                <input type="password" name="password" id="password">
                <button class="btn btn-dark type="submit">Sign In</button>
            </div>
        </form>

	</div>


</body>
</html>