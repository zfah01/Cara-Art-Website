<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CaraArt | Upload</title>
    <link class="img-responsive logo img-circle margin" rel="icon" href="Resources/logo.jpg">
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    html body{
        background: #D3D3D3;
    }



    .titles{
        padding-top: 10%;
        text-align: center;
        font-family: 'ABeeZee', sans-serif;

    }

    .form{
        margin-top: 15%;
    }

    .newPainting{
        margin-bottom: 5%;
        padding-bottom: 2%;
        padding-top: 2%;
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
    .wrapper{
        text-align: center;
    }
</style>

<script>
    function checkForm(){
        let name = document.forms["upload"]["name"];
        let artPiece = document.forms["upload"]["art-piece"];
        let date = document.forms["upload"]["dateofCompletion"];
        let width = document.forms["upload"]["width"];
        let height= document.forms["upload"]["height"];
        let price = document.forms["upload"]["price"];
        let description = document.forms["upload"]["description"];
        let errs = "";

        name.style.background = "white";
        artPiece.style.background = "white";
        date.style.background = "white";
        width.style.background = "white";
        height.style.background = "white";
        price.style.background = "white";
        description.style.background = "white";


        if(name.value === ""){
            errs+=" * Name\n";
            name.style.background = "pink";
        }

        if(artPiece.value === ""){
            errs+=" * Art Piece\n";
            artPiece.style.background = "pink";
        }

        if(date.value === ""){
            errs+=" * Date of Completion\n";
            date.style.background = "pink";
        }

        if(width.value === ""){
            errs+=" * Width\n";
            width.style.background = "pink";
        }
        if(height.value === ""){
            errs+=" * Height\n";
            height.style.background = "pink";
        }
        if(price.value === ""){
            errs+=" * Price\n";
            price.style.background = "pink";
        }
        if(description.value === ""){
            errs+=" * Description\n";
            description.style.background = "pink";
        }

        if(errs !== ""){
            alert("Please fill the following fields: \n" + errs);
        }

        return (errs==="");

    }

    function checkName(){
        let name = document.forms["upload"]["name"];
        if(name.value === ""){
            name.style.background = "pink";
        } else{
            name.style.background = "white";
        }
    }

    function checkArt(){
        let art = document.forms["upload"]["art-piece"];
        if(art.value === ""){
            art.style.background = "pink";
        } else{
            art.style.background = "white";
        }
    }

    function checkDate(){
        let date = document.forms["bookingForm"]["dateofCompletion"];
        if(date.value === ""){
            date.style.background = "pink";
        } else{
            date.style.background = "white";
        }
    }

    function checkWidth(){
        let width = document.forms["upload"]["width"];
        if(width.value === ""){
            width.style.background = "pink";
        } else{
            width.style.background = "white";
        }
    }
    function checkHeight(){
        let height = document.forms["upload"]["height"];
        if(height.value === "" ){
            height.style.background = "pink";
        } else{
            height.style.background = "white";
        }
    }

    function checkPrice(){
        let price = document.forms["upload"]["price"];
        if(price.value === "" ){
            price.style.background = "pink";
        } else{
            price.style.background = "white";
        }
    }

    function checkDescription(){
        let description = document.forms["upload"]["description"];
        if(description.value === "" ){
            description.style.background = "pink";
        } else{
            description.style.background = "white";
        }
    }
</script>
<body>

<?php
include "./navigationBar.html";
?>

<?php
require_once "/home/wsb19173/DEVWEB/2021/zsyterombjjbihu/password.php";

function getPOSTsafely($conn, $name)
{
    if (isset($_POST[$name])) {
        return $conn->real_escape_string(strip_tags($_POST[$name]));
    } else {
        return "";
    }
}

$host = "devweb2021.cis.strath.ac.uk";
$username = "wsb19173";
$password = get_password();
$dbname = "wsb19173";
$conn = new mysqli($host, $username, $password, $dbname);



if(!isset($_POST['name'])){
?>
<h2 class='titles'>Add New Painting</h2>
<div class="col-lg-7 mx-auto bg-white rounded shadow">
    <div class = "container newPainting bg-white">
    <form action="upload.php" name="upload" method="POST"  enctype="multipart/form-data" onsubmit="return checkForm();">
        <div class = "form-group">
            <label for = "name">Name: </label>
            <input name = "name" type = "text" class = "form-control" placeholder = "Enter Name" onchange="checkName()">
        </div>

        <div class = "form-group">
            <label for = "art-piece">Art Piece: </label>
            <input name = "art-piece" id="art-piece" type = "file" class = "form-control"  accept="image/*" onchange="checkArt()">
        </div>

        <div class = "form-group">
            <label for = "dateofCompletion">Date of Completion: </label>
            <input name = "dateofCompletion" type = "date" class = "form-control" placeholder = "Enter Date of Completion" onchange="checkDate()">
        </div>

        <div class = "form-group">
            <label for = "width">Width(mm):</label>
            <input name = "width" type = "text" class = "form-control" placeholder = "Enter Width" onchange="checkWidth()">
        </div>

        <div class = "form-group">
            <label for = "height">Height(mm):</label>
            <input name = "height" type = "text" class = "form-control" placeholder = "Enter Height" onchange="checkHeight()">
        </div>

        <div class = "form-group">
            <label for = "price">Price: </label>
            <input name = "price" type = "text" class = "form-control" placeholder = "Enter Price" onchange="checkPrice()">
        </div>

        <div class = "form-group">
            <label for = "description">Description: </label>
            <input name = "description" type = "text" class = "form-control" placeholder = "Enter Description" onchange="checkDescription()">
        </div>
        <div class = wrapper>
        <p><input type="submit" class="submit"/></p>
        </div>
    </form>

</div>
</div>
    <?php
    if($_FILES){
        $name = $_FILES['art-piece']['name'];
        move_uploaded_file($_FILES['art-piece']['tmp_name'], $name);
    }

    ?>
<?php
}else {
    $name = getPOSTsafely($conn, "name");
    $art =  addslashes(file_get_contents($_FILES["art-piece"]["tmp_name"]));
    $date = getPOSTsafely($conn, "dateofCompletion");
    $width = getPOSTsafely($conn, "width");
    $height = getPOSTsafely($conn, "height");
    $price = getPOSTsafely($conn, "price");
    $description = getPOSTsafely($conn, "description");

    echo ' <div class="container form">
                        <div class="form-group message">
                            <h1 class="titles">New Painting added successfully</h1>
                        </div>
                        <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> 100% completed...</div>
</div>
    </div>';

    $sql = "INSERT INTO `artListings`(`id`, `name`, `art-piece`, `date of completion`, `width (mm)`, `height (mm)`, `price (£)`, `description`) 
        VALUES (NULL,'$name','$art','$date','$width','$height','$price','$description')";
    $result = $conn->query($sql);
    $conn->close();
}
?>
</body>
</html>





