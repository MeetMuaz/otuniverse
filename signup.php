<?php
include 'header.php';
?>

<form action="includes/signup.inc.php" method="post"></P>
    <p><input type="text" name="name" placeholder="Full Name..."></P>
    <p><input type="email" name="email" placeholder="Email..."></P>
    <p><input type="text" name="uid" placeholder="Username..."></P>
    <p><input type="password" name="pwd" placeholder="Password..."></P>
    <p><input type="password" name="pwdRepeat" placeholder="Repeat Password..."></P>
    <p><button type="submit" name="submit">Sign Up</button></P>
</form>

<?php
    if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!<p>";
        }
        else if ($_GET['error'] == "invaliduid") {
            echo "<p>Choose a proper username!<p>";
        }
        else if ($_GET['error'] == "invalidemail") {
            echo "<p>Choose a proper email!<p>";
        }
        else if ($_GET['error'] == "passwordsissmall") {
            echo "<p>passwords must be more than 6!<p>";
        }
        else if ($_GET['error'] == "passwordsdontmatch") {
            echo "<p>passwords doesn't match!<p>";
        }
        else if ($_GET['error'] == "usernameexists") {
            echo "<p>Username taken!<p>";
        }
        else if ($_GET['error'] == "stmtfailed") {
            echo "<p>something went wrong, try again!<p>";
        }
        else if ($_GET['error'] == "none") {
            echo "<p>You have signed up!<p>";
        }
    }
?>

<?php
include 'footer.php';
?>