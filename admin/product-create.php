<h2>Product Create</h2>
<form action="includes/product-create.inc.php" method="post">
    <p><input type="text" name="productName" placeholder="Product Name..."></p>
    <p><input type="number" name="productPrice" placeholder="price"></p>
    <p><input type="number" name="productQuantity" placeholder="quantity"></p>
    <p><input type="file" name="productImage1" class=""></p>
    <p><input type="file" name="productImage2" class=""></p>
    <p><input type="file" name="productImage3" class=""></p>
    <p><textarea name="productAbout" id="" cols="30" rows="10"></textarea></p>
    <button type="submit" name="submit">submit</button>
</form>
<?php
    if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!<p>";
        }
        if ($_GET["error"] == "invalidprice") {
            echo "<p>Fill in a number!<p>";
        }
        if ($_GET["error"] == "invalidquantity") {
            echo "<p>Fill in a number!<p>";
        }
    }
?>