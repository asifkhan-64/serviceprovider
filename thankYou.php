<?php

include './Admin/_stream/config.php';


include './_sections/_header.php';
?>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<style>
    body {
        background-color:white
    }

    .height-100 {
        height:80vh
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
                <h6>Account Verified!</h6>
                <div>
                    <hr style="color: black !important" />
                    <span>Wait for the admin Approval!<br /><br /> You will be notified by email through your provided Email.</span>
                    <hr style="color: black !important" />
                </div>
                <h6>Thank You!</h6>
            </div> 
        </div>
    </div>
</section>

<?php include './_sections/_footer.php'; ?>
