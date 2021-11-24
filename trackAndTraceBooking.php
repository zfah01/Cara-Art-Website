<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CaraArt | Track and Trace</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link class="img-responsive logo img-circle margin" rel="icon" href="Resources/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Petemoss&display=swap" rel="stylesheet">
    <style>
        html body{
            background: #D3D3D3;
        }
        .logoImg img{
            width:20%;
            border-radius: 50%;
        }

        .logoImg{
            padding-top: 7%;
            text-align: center ;
        }
        .form {
            background: #ffffff;
            margin-top: 10%;
            margin-bottom: 5%;
            border-style: solid;
            border-color:#d4af37 ;
            border-width: thick;
        }



        #info-title{
            text-align: center;
            font-family: 'Petemoss', cursive;
            text-decoration: underline;
            text-decoration-thickness: 7%;
            padding-top: 3%;
        }


        .submit{
            position: relative;
            background: #000;
            border: 0;
            padding: 14px 42px;
            border-radius: 3px;
            cursor: pointer;
            overflow: hidden;
            outline: none;
            font-weight: 400;
            font-size: 12px;
            color: #fff;
            letter-spacing: .2em;
            box-shadow: 0 8px 32px;
            transition: all .2s ease;
        }

        .submit:hover:after {
            animation shine 1.6s ease
        }
        .submit:active {
            transform translateY(1px) ;
            box-shadow 0 4px 16px ;
        }

        #name{
            padding-top: 3%;
        }


        .message{
            text-align: center;
        }



    </style>
    <script>
        function checkForm(){
            let firstName = document.forms["trackAndTrace"]["firstName"];
            let surname = document.forms["trackAndTrace"]["surname"];
            let phone = document.forms["trackAndTrace"]["phone"];
            let email = document.forms["trackAndTrace"]["email"];
            let DateTime = document.forms["trackAndTrace"] ["dateAndTime"];
            let errs = "";

            firstName.style.background = "white";
            surname.style.background = "white";
            phone.style.background = "white";
            email.style.background = "white";
            DateTime.style.background = "white";

            if(firstName.value === ""){
                errs+=" * First Name\n";
                firstName.style.background = "pink";
            }
            if(surname.value === ""){
                errs+=" * Surname\n";
                surname.style.background = "pink";
            }

            if(phone.value === ""){
                errs+=" * Phone Number\n";
                phone.style.background = "pink";
            }

            if(email.value === ""){
                errs+=" * Email\n";
                email.style.background = "pink";
            }

            if(DateTime.value === ""){
                errs+=" * Date and Time\n";
                DateTime.style.background = "pink";
            }

            if(errs !== ""){
                alert("Please fill the following fields: \n" + errs);
            }

            return (errs==="");

        }

        function checkFirstName(){
            let firstname = document.forms["trackAndTrace"]["firstName"];
            if(firstname.value === ""){
                firstname.style.background = "pink";
            } else{
                firstname.style.background = "white";
            }
        }

        function checkSurname(){
            let surname = document.forms["trackAndTrace"]["surname"];
            if(surname.value === ""){
                surname.style.background = "pink";
            } else{
                surname.style.background = "white";
            }
        }

        function checkPhone(){
            let phone = document.forms["trackAndTrace"]["phone"];
            if(phone.value === ""){
                phone.style.background = "pink";
            } else{
                phone.style.background = "white";
            }
        }

        function checkEmail(){
            let email = document.forms["trackAndTrace"]["email"];
            if(email.value === ""){
                email.style.background = "pink";
            } else{
                email.style.background = "white";
            }
        }


        function checkDateTime(){
            let DateTime = document.forms["trackAndTrace"]["dateAndTime"];
            if(DateTime.value === "" ){
                DateTime.style.background = "pink";
            } else{
                DateTime.style.background = "white";
            }
        }

        function next4weeks(){
            <?php date('F',strtotime('+1 months')) ?>
        }
    </script>
</head>
<body>

<?php
include "./navigationBar.html";
?>

<?php
require_once "/home/wsb19173/DEVWEB/2021/zsyterombjjbihu/password.php";

function getPOSTsafely($conn,$name){
    if(isset($_POST[$name])){
        return $conn-> real_escape_string(strip_tags($_POST[$name]));
    }else{
        return "";
    }
}

$host = "devweb2021.cis.strath.ac.uk";
$username="wsb19173";
$password= get_password();
$dbname="wsb19173";
$conn = new mysqli($host,$username,$password,$dbname);

if(!isset($_POST['firstName'])){
    ?>

    <div class="container form">
        <div class="logoImg">
            <img src="Resources/logo.jpg" alt="logo"/>
            <form name="trackAndTrace" action="trackAndTraceBooking.php" method="post" onsubmit="return checkForm();">
                <h1 id="info-title">Please fill in the form below to make an appointment at the art gallery</h1>
                <div class="row">
                    <div class="form-group col-lg-6">
                        First Name: <input id="firstName" type="text" name="firstName" class="form-control"
                                     onchange="checkFirstName()"/>
                    </div>
                    <div class="form-group col-lg-6">
                        Surname: <input id="surname" type="text" name="surname" class="form-control"
                                           onchange="checkSurname()"/>
                    </div>
                    <div class="form-group col-lg-6">
                        Phone Number: <input id="tel" type="tel" name="phone" class="form-control" pattern='^\+?\d{0,13}'
                                             onchange="checkPhone()"/>
                    </div>
                    <div class="form-group col-lg-6">
                        Email: <input id="email" type="email" name="email" class="form-control"
                                      onchange="checkEmail()"/>
                    </div>


                    <div class="form-group col-lg-6">
                       Date and Time: <input type="datetime-local" name="dateAndTime" class="form-control"
                               onchange="checkDateTime()"/>
                    </div>
                </div>
                <p><input type="submit" class="submit"/></p>
            </form>
        </div>
    </div>
    <?php
} else {

    $firstName = getPOSTsafely($conn, "firstName");
    $surname = getPOSTsafely($conn, "surname");
    $phone = getPOSTsafely($conn, "phone");
    $dateTime = getPOSTsafely($conn, "dateAndTime");
    $address = getPOSTsafely($conn, "address");

    echo ' <div class="container form">
        <div class="logoImg">
            <img src="Resources/logo.jpg" id="image" alt="logo"/>
            <form name="trackAndTrace" action="trackAndTraceBooking.php" method="post" onsubmit="return checkForm();">
                        <div class="form-group message">
                            <h1 id="name">' . $firstName .'</h1>
                            <h1>Thanks for booking an appointment to visit CaraArt</h1>
                            <h2>Your appointment is booked for '.$dateTime.' </h2>
                        </div>
            </form>
        </div>
    </div>';

    $sql="INSERT INTO `trackAndTrace`(`first-name`, `surname`, `phone-number`, `date/time`) VALUES ('$firstName','$surname','$phone','$dateTime')";
    $result = $conn->query($sql);
    $conn->close();
}
?>
</body>
</html>