<?php
include 'header.php';
?>

<form action="includes/contact.inc.php" method="post">
    <p><input type="name" name="name" placeholder="Full Name..."></p>
    <p><input type="email" name="email" placeholder="Email..."></p>
    <p><input type="number" name="phone" placeholder="Phone..."></p>
    <p><textarea name="message" id="" cols="30" rows="10" placeholder="Message..."></textarea></p>
    <p><button type="submit" name="submit">submit</button></p>
</form>

<?php
    if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!<p>";
        }
        else if ($_GET['error'] == "invalidname") {
            echo "<p>Choose a proper name!<p>";
        }
        else if ($_GET['error'] == "invalidemail") {
            echo "<p>Choose a proper email!<p>";
        }
        else if ($_GET['error'] == "invalidphone") {
            echo "<p>Choose a valid phone number!<p>";
        }
        else if ($_GET['error'] == "stmtfailed") {
            echo "<p>Choose a proper phone number!<p>";
        }
        else if ($_GET['error'] == "none") {
            echo "<p>Your message has been submited!<p>";
        }
    }
?>

<?php
include 'footer.php';
?>