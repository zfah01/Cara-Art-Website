<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CaraArt | Booking</title>
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

        #info{
            padding-bottom: 3%;
        }

        #submit{
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

        button:hover:after {
            animation shine 1.6s ease
        }
        button:active {
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
        let firstname = document.forms["bookingForm"]["firstName"];
        let surname = document.forms["bookingForm"]["surname"];
        let phone = document.forms["bookingForm"]["phone"];
        let email = document.forms["bookingForm"]["email"];
        let address1 = document.forms["bookingForm"] ["address1"];
        let address2 = document.forms["bookingForm"] ["address2"];
        let postcode = document.forms["bookingForm"] ["postcode"];
        let city = document.forms["bookingForm"] ["city"];
        let county = document.forms["bookingForm"] ["county"];
        let country = document.forms["bookingForm"] ["country"];
        let errs = "";

        firstname.style.background = "white";
        surname.style.background = "white";
        phone.style.background = "white";
        email.style.background = "white";
        address1.style.background = "white";
        address2.style.background = "white";
        postcode.style.background = "white";
        city.style.background = "white";
        county.style.background = "white";
        country.style.background = "white";

        if(firstname.value === ""){
            errs+=" * First Name\n";
            firstname.style.background = "pink";
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
        if(address1.value === ""){
            errs+=" * Address Line 1\n";
            address1.style.background = "pink";
        }
        if(postcode.value === ""){
            errs+=" * Postcode\n";
            postcode.style.background = "pink";
        }
        if(city.value === ""){
            errs+=" * City\n";
            city.style.background = "pink";
        }

        if(county.value === ""){
            errs+=" * County\n";
            county.style.background = "pink";
        }

        if(country.value === ""){
            errs+=" * Country\n";
            country.style.background = "pink";
        }

        if(errs !== ""){
            alert("Please fill the following fields: \n" + errs);
        }

        return (errs==="");

    }

    function checkFirstname(){
        let firstname = document.forms["bookingForm"]["firstName"];
        if(firstname.value === ""){
          firstname.style.background = "pink";
        } else{
            firstname.style.background = "white";
        }
    }

    function checkSurname(){
        let surname = document.forms["bookingForm"]["surname"];
        if(surname.value === ""){
            surname.style.background = "pink";
        } else{
            surname.style.background = "white";
        }
    }

    function checkPhone(){
        let phone = document.forms["bookingForm"]["phone"];
        if(phone.value === ""){
            phone.style.background = "pink";
        } else{
            phone.style.background = "white";
        }
    }

    function checkEmail(){
        let email = document.forms["bookingForm"]["email"];
        if(email.value === ""){
            email.style.background = "pink";
        } else{
            email.style.background = "white";
        }
    }
    function checkAddress1(){
        let address1 = document.forms["bookingForm"]["address1"];
        if(address1.value === "" ){
            address1.style.background = "pink";
        } else{
            address1.style.background = "white";
        }
    }
    function checkPostcode(){
        let postcode = document.forms["bookingForm"]["postcode"];
        if(postcode.value === "" ){
            postcode.style.background = "pink";
        } else{
            postcode.style.background = "white";
        }
    }

    function checkCity(){
        let city = document.forms["bookingForm"]["city"];
        if(city.value === "" ){
            city.style.background = "pink";
        } else{
            city.style.background = "white";
        }
    }

    function checkCounty(){
        let county = document.forms["bookingForm"]["county"];
        if(county.value === "" ){
            county.style.background = "pink";
        } else{
            county.style.background = "white";
        }
    }

    function checkCountry(){
        let country = document.forms["bookingForm"]["country"];
        if(country.value === "" ){
            country.style.background = "pink";
        } else{
            country.style.background = "white";
        }
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
    $conn1 = new mysqli($host,$username,$password,$dbname);

    $sqlCheck = "SELECT `paintingID` from `artOrders` where `paintingID` = '{$_POST['id']}'";
    $result = $conn1-> query($sqlCheck);
    $row = mysqli_fetch_array($result);

    if(isset($_POST['id']) && isset($_POST['name']) && !isset($_POST['firstName'])){
        $id = $_POST['id'];
        $paintingName = $_POST['name'];
        ?>

    <div class="container form">
        <div class="logoImg">
            <img src="Resources/logo.jpg" alt="logo"/>
            <form name="bookingForm" action="booking.php" method="post" onsubmit="return checkForm();">
                        <h1 id ="info-title">Booking</h1>
                   <h1 id="info">Painting No: <?php echo $id ?> Name:<?php echo $paintingName ?></h1>
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
                        Address Line 1: <input id="address1" type="text" class="form-control" name="address1"
                                               onchange="checkAddress1()"/>
                    </div>
                    <div class="form-group col-lg-6">
                        Address Line 2: <input id="address2" type="text" class="form-control" name="address2"/>
                    </div>
                    <div class="form-group col-lg-6">
                        Postcode: <input id="postcode" type="text" class="form-control" name="postcode"
                                               onchange="checkPostcode()"/>
                    </div>
                    <div class="form-group col-lg-6">
                        City: <input id="city" type="text" class="form-control" name="city"
                                               onchange="checkCity()"/>
                    </div>
                    <div class="form-group col-lg-6">
                        County: <input id="county" type="text" class="form-control" name="county"
                                        onchange="checkCounty()"/>
                    </div>
                    <div class="form-group col-lg-6">
                        Country: <input id="country" type="text" class="form-control" name="country"
                                     onchange="checkCountry()"/>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="hidden" name="name" value="<?php echo $paintingName ?>"/>
                    </div>
                </div>
                    <p><input type="submit" id="submit"/></p>
            </form>
        </div>
    </div>
    <?php
} else {
        $conn2 = new mysqli($host,$username,$password,$dbname);

        $id = getPOSTsafely($conn2,"id");
        $firstname = getPOSTsafely($conn2, "firstName");
        $surname = getPOSTsafely($conn2, "surname");
        $paintingName = getPOSTsafely($conn2, "name");
        $phone = getPOSTsafely($conn2, "phone");
        $email = getPOSTsafely($conn2, "email");
        $address1 = getPOSTsafely($conn2, "address1");
        $address2 = getPOSTsafely($conn2, "address2");
        $postcode = getPOSTsafely($conn2,"postcode");
        $city = getPOSTsafely($conn2,"city");
        $county = getPOSTsafely($conn2,"county");
        $country = getPOSTsafely($conn2,"country");

        echo ' <div class="container form">
        <div class="logoImg">
            <img src="Resources/logo.jpg" alt="logo"/>
            <form name="bookingForm" action="booking.php" method="post" onsubmit="return checkForm();">
                        <div class="form-group message">
                            <h1 id="name">' . $firstname .'</h1>
                            <h1>Thanks for your order</h1>
                            <h3>Your order will be delivered to: </h3>
                            <h3>' . $address1 . ' </h3>
                            <h3>' . $address2 . ' </h3>
                            <h3>' . $postcode . ' </h3>
                            <h3> ' . $city . ' </h3>
                            <h3> ' . $county . ' </h3>
                            <h3> ' . $country . ' </h3>
                        </div>
            </form>
        </div>
    </div>';

        $sql="INSERT INTO `artOrders`(`paintingID`, `paintingName`, `first-name`, `surname`, `phone-number`, `email`, `address1`, `address2`, `postcode`, `city`, `county`,`country`) 
        VALUES ('$id','$paintingName','$firstname','$surname','$phone','$email','$address1','$address2','$postcode','$city','$county','$country')";
        $result = $conn2->query($sql);
        $conn2->close();
    }
?>
</body>
</html>