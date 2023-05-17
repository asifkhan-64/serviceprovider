<?php

include './Admin/_stream/config.php';

include './_sections/_header.php';

$email = $_GET['email'];

if (isset($_POST["resendCode"])) {
    $email = $_POST['email'];

    $confirmationCode = random_int(100000, 999999);

    $updateQuery = mysqli_query($connect, "UPDATE car_owner SET confirmation_code = '$confirmationCode' WHERE email = '$email'");
    
    if ($updateQuery) {
        // $to      = $email;
        // $subject = "Service Provider Email Verification";
        // $message = 'Your Email Verification Code is ' .$confirmationCode.'' ."\r\n". '. Click here to complete your account verification: careskin.info/FYP/verification.php?email='.$email. "\r\n". '';
        // $from    = "testing@careskin.info";
        // $headers = "From: $from";

        // $mailConfirm = mail($to, $subject, $message, $headers);
        echo '
            <script>
                alert("Email Sent Successfully! Please check your spam folder!");
            </script>
        ';
    }
}
?>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<style>
    body {
        background-color:white
    }

    .height-100 {
        height:100vh
    }

    .card {
        width:400px;
        border:none;
        height:300px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index:1;
        display:flex;
        justify-content:center;
        align-items:center
    }
    
    .card h6 {
        color:black;
        font-size:20px
    }
    
    .inputs input {
        width:40px;
        height:40px
    }
    
    input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }
    
    .card-2 {
        background-color:#fff;
        padding:10px;
        width:350px;
        height:100px;
        bottom:-50px;
        left:20px;
        position:absolute;
        border-radius:5px
    }
    
    .card-2 .content {
        margin-top:50px
    }
    
    .card-2 .content a {
        color:red
    }
    
    .form-control:focus {
        box-shadow:none;
        border:2px solid green
    }
    
    .validate {
        border-radius:20px;
        height:40px;
        background-color:red;
        border:1px solid red;
        width:140px
    }


    @media only screen and (max-width: 425px) {
        .card {
            margin-top: -100%;
        }

        .ftco-footer {
            margin-top: -100%;
        }
    }


</style>

<section class="ftco-section contact-section">
    <div class="container height-100 d-flex justify-content-center align-items-center">
        <div class="position-relative"> 
            <div class="card p-2 text-center ">
                <h6>Email Verification code has been sent your email. Please Check your email!</h6>
                <div>
                    <span>A code has been sent to</span> 
                    <small><?php echo $email ?></small> <br />
                    <!-- <small>If You did'nt receive confirmation code please check your spam folder!</small>  -->
                </div>
                <form method="POST">
                    <div class="mt-4"> 
                        <input type="hidden" name="email" value="<?php echo $email ?>">
                        <span>Didn't get the code? </span> &nbsp;
                        <button type="submit" name="resendCode" class="btn btn-danger px-4 validate">Resend</button>
                        <hr style="color: black !important" />
                        <span>Please check your spam folder!</span> &nbsp;
                        
                    </div>
                </form> 
            </div> 
        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {
  
    function OTPInput() {
        const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) { 
            inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput();        
    });

   </script>
<?php include './_sections/_footer.php'; ?>
