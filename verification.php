<?php

    include './Admin/_stream/config.php';

    $tokenError = '';

    $getEmail = $_GET['email'];
    $getCodeQuery = mysqli_query($connect, "SELECT * FROM car_owner WHERE email = '$getEmail'");
    $fetch_codeQuery = mysqli_fetch_assoc($getCodeQuery);
    $code = $fetch_codeQuery['confirmation_code'];

    if (isset($_POST['valideCode'])) {
        $codeArray = $_POST['code'];
        

        $userCode = implode("", $codeArray);

        if ($userCode === $code) {
            $updateVerificationStatus = mysqli_query($connect, "UPDATE car_owner SET v_status = '1' WHERE email = '$getEmail'");
            if ($updateVerificationStatus) {
                header("LOCATION: thankYou.php");
            }
        }else {
            $tokenError = '
            <div class="alert alert-danger text-center">
                Incorrect Code! Please Try Again!
            </div>
            ';
        }
    }

    include './_sections/_header.php';
?>


<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<style>
    body{
        background-color:white
    }

    .height-100{
        height:100vh
    }

    .card{
        width:400px;
        border:none;
        height:300px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index:1;
        display:flex;
        justify-content:center;
        align-items:center
    }
    
    .card h6{
        color:black;
        font-size:20px
    }
    
    .inputs input{
        width:40px;
        height:40px
    }
    
    input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button{
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }
    
    .card-2{
        background-color:#fff;
        padding:10px;
        width:350px;
        height:100px;
        bottom:-50px;
        left:20px;
        position:absolute;
        border-radius:5px
    }
    
    .card-2 .content{
        margin-top:50px
    }
    
    .card-2 .content a{
        color:red
    }
    
    .form-control:focus{
        box-shadow:none;
        border:2px solid green
    }
    
    .validate{
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

<form method="POST">
    <section class="ftco-section contact-section">
        <div class="container height-100 d-flex justify-content-center align-items-center">
            <div class="position-relative">
                <?php echo $tokenError ?>
                <div class="card p-2 text-center ">
                    <h6>Please enter the verification code to verify your account</h6>
                    <div>
                        <span>A code has been sent to</span> 
                        <small><?php echo $getEmail ?></small> 
                    </div>
                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                        <input class="m-2 text-center form-control rounded" required="" name="code[]" type="text" id="first" maxlength="1" /> 
                        <input class="m-2 text-center form-control rounded" required="" name="code[]" type="text" id="second" maxlength="1" /> 
                        <input class="m-2 text-center form-control rounded" required="" name="code[]" type="text" id="third" maxlength="1" /> 
                        <input class="m-2 text-center form-control rounded" required="" name="code[]" type="text" id="fourth" maxlength="1" /> 
                        <input class="m-2 text-center form-control rounded" required="" name="code[]" type="text" id="fifth" maxlength="1" /> 
                        <input class="m-2 text-center form-control rounded" required="" name="code[]" type="text" id="sixth" maxlength="1" /> 
                    </div> 
                    <div class="mt-4"> 
                        <button class="btn btn-danger px-4 validate" name="valideCode" type="submit">Validate</button> 
                    </div> 
                </div>
            </div>
        </div>
    </section>
</form>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {
  
    function OTPInput() {
        const inputs = document.querySelectorAll('#otp > *[id]');
        for (let i = 0; i < inputs.length; i++) { 
            inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput();        
    });

   </script>
<?php include './_sections/_footer.php'; ?>
