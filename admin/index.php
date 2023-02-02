<?php
include_once 'header.php';
?>

<?php
    if (isset($_SESSION["adminuid"])) {
        echo "<p>Hello there " . $_SESSION["adminuid"] . "<p>";
    }
?>

<?php
include_once 'footer.php';
?>

