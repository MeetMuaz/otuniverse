<?php
include 'header.php';
?>
<style>
    .alert{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
    }

    .success{
        height: 40px;
        background-color: #4BB543;
        margin: 10px 0;
    }

    .danger{
        height: 40px;
        background-color: #FF0000;
        margin: 10px 0;
    }
</style>
<!--    includes/contact.inc.php-->
<div class="alert"></div>
<form id="contactForm" data-parsley-validate="data-parsley-validate" data-parsley-excluded="input[type=button], input[type=submit], input[type=reset], input[type=hidden], :disabled, :hidden" method="POST">
    <p><input type="name" id="name" required name="name" placeholder="Full Name..."></p>
    <p><input type="email" id="email" required name="email" placeholder="Email..."></p>
    <p><input type="number" id="number" required name="phone" placeholder="Phone..."></p>
    <p><textarea name="message" id="message" required id="" cols="30" rows="10" placeholder="Message..."></textarea></p>
    <p><button type="submit" id="contactBtn" name="submit">Contact Us</button></p>
</form>

<?php
//    if(isset($_GET["error"])){
//        if ($_GET["error"] == "emptyinput") {
//            echo "<p>Fill in all fields!<p>";
//        }
//        else if ($_GET['error'] == "invalidname") {
//            echo "<p>Choose a proper name!<p>";
//        }
//        else if ($_GET['error'] == "invalidemail") {
//            echo "<p>Choose a proper email!<p>";
//        }
//        else if ($_GET['error'] == "invalidphone") {
//            echo "<p>Choose a valid phone number!<p>";
//        }
//        else if ($_GET['error'] == "stmtfailed") {
//            echo "<p>Choose a proper phone number!<p>";
//        }
//        else if ($_GET['error'] == "none") {
//            echo "<p>Your message has been submited!<p>";
//        }
//    }
?>

<?php
include 'footer.php';
?>

<script>
    $("#contactBtn").on('click', function(e){
        e.preventDefault();

        // collect all form data
        let name = $("#name").val();
        let email = $("#email").val();
        let number = $("#number").val();
        let message = $("#message").val();

        //form validator
        if (!$("#contactForm").parsley().validate()){
            return;
        }

        // ajax request
        $.ajax({
            type:"POST",
            url: "includes/contact.inc.php",
            data: {
                name: name,
                email: email,
                number: number,
                message: message,
                action: "sendContactMsg"
            },
            beforeSend: function() {
                $("#contactBtn").attr("disabled", true).text("Loading .....");
            },
            success: function (data) {
                $("#contactBtn").attr("disabled", false).text("Contact Us");

                if (data.status == 200){
                    $("#contactForm")[0].reset();
                    $(".alert").removeClass("danger").addClass("success").text(data.message);
                }else{
                    $(".alert").removeClass("success").addClass("danger").text(data.message);
                }
            }
        })
    })
</script>
