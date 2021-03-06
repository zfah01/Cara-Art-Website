<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CaraArt | Art Details</title>
    <link class="img-responsive logo img-circle margin" rel="icon" href="Resources/logo.jpg">
</head>
<body>
<style>
    html,body{
        background: #D3D3D3;
    }
    .container-fluid img {
        width: 100%;
        alignment: center;

    }
    .container-fluid {
        padding-top: 7%;
        background: #D3D3D3;
    }
    .art-pieces{
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        padding-bottom: 3%;
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
        margin-right: 2%;
        letter-spacing: .2em;
        transition: all .2s ease;
    }
    .info{
        font-family: 'ABeeZee', sans-serif;
    }
    #Msg{
        color: red;
    }
</style>
<?php
include "./navigationBar.html";
require_once "/home/wsb19173/DEVWEB/2021/zsyterombjjbihu/password.php";
$host = "devweb2021.cis.strath.ac.uk";
$username="wsb19173";
$password= get_password();
$dbname="wsb19173";
$conn = new mysqli($host,$username,$password,$dbname);
$conn2 = new mysqli($host,$username,$password,$dbname);

$id = $_POST['id'];
$sql = "SELECT `paintingID` from `artOrders` where `paintingID` = $id;";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$availability= null;

    if($row > 0){
        $availability = false;
    } else{
        $availability = true;
    }
    $conn2->close();
?>
<div>
    <?php
    $sql2 = "SELECT * FROM `artListings` WHERE `id` = $id";
    $result2 = $conn->query($sql2);

    while($row = $result2->fetch_assoc()){
        $name = $row['name'];
        echo'<div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-sm-6">
                  <img class="center-block art-pieces" src="data:image/jpeg;base64,' . base64_encode($row['art-piece']) . ' "height=100%" width="100%"/>
                </div>
                <div class="col-sm-6" id = "description">
                 <h3 class="info">  ' . $name . ' </h3>
                 <h3 class="info"> Completion date: ' . $row['date of completion'] . ' </h3>
                 <h3 class="info"> Size: ' . $row['width (mm)'] . ' x ' . $row['height (mm)'] . ' mm</h3>
                 <h3 class="info"> Price: ?? ' . $row['price (??)'] . '  </h3>
                 <p class="info"> Description: ' . $row['description'] . ' </p>
                 <div class="btn-toolbar mb-3" role="toolbar" aria-label="Back">
                  <button onclick="history.go(-1);" class="submit" id="submit" >Back </button>';

        if($availability == true){
            echo ' <form method="post" action="booking.php" >
                 <input type="submit" name="action" value="Book" class="submit "id="submit" />
                  <input type="hidden" name="id" value= "' . $row['id'] . '" />
                  <input type="hidden" name="name" value="' . $row['name'] . '" />
               </form>
               </div>
              </div>
              </div>
            </div>
                ';
        } else {
            echo ' <form method="post" action="booking.php" >
                 <input type="submit" name="action" value="Book" id="submit" disabled />
                  <input type="hidden" name="id" value= "' . $row['id'] . '" />
                  <input type="hidden" name="name" value="' . $name . '" />
               </form>
               </div>
                <h4 id="Msg" class="info"> Sorry, this painting is unavailable </h4>
              </div>
              </div>
            </div>
                ';
        }
    }
    $conn->close();

    ?>
</div>
</body>
</html>