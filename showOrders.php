<!DOCTYPE html>
<html lang="en">
<head>
    <title>CaraArt | Orders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link class="img-responsive logo img-circle margin" rel="icon" href="Resources/logo.jpg">
    <style>
        html body{
            background: #D3D3D3;
        }

        .titles{
            text-align: center;
            padding-top: 5%;

        }

    </style>
</head>
<body>

<?php
include "./navigationBar.html";
?>

<?php
  require_once "/home/wsb19173/DEVWEB/2021/zsyterombjjbihu/password.php";
        $host = "devweb2021.cis.strath.ac.uk";
        $username="wsb19173";
        $password= get_password();
        $dbname="wsb19173";
        $conn = new mysqli($host,$username,$password,$dbname);

        $sql = "SELECT * FROM `artOrders`";
        $result = $conn->query($sql);

        if(!$result){
            die("Query failed". $conn->error);
        }

        $result-> data_seek(0);

        if($result->num_rows > 0){
            echo"<div class='container py-5'>";
            echo"<h2 class='titles'>Orders </h2>";
            echo"<div class='col-lg-7 mx-auto bg-white rounded shadow'>";
            echo"<div class='table-responsive'>";
            echo "<table class='table table-striped'>\n";
            ?>
    <thead class="headings">
    <tr>
        <th scope="col">Painting ID</th>
        <th scope="col">Painting Name</th>
        <th scope="col">First Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Email</th>
        <th scope="col">Address Line 1</th>
        <th scope="col">Address Line 2</th>
        <th scope="col">County</th>
        <th scope="col">Postcode</th>
        <th scope="col">City</th>
        <th scope="col">Country</th>
    </tr>
    </thead>
<?php
            while($row = $result->fetch_assoc()){
                echo"<tbody>\n";
                echo"<tr>\n";
                echo"<th scope='row'>".$row['paintingID']."</th>\n";
                echo"<td>".$row['paintingName']."</td>\n";
                echo"<td>".$row['first-name']."</td>\n";
                echo"<td>".$row['surname']."</td>\n";
                echo"<td>".$row['phone-number']."</td>\n";
                echo"<td>".$row['email']."</td>\n";
                echo"<td>".$row['address1']."</td>\n";
                echo"<td>".$row['address2']."</td>\n";
                echo"<td>".$row['county']."</td>\n";
                echo"<td>".$row['postcode']."</td>\n";
                echo"<td>".$row['city']."</td>\n";
                echo"<td>".$row['country']."</td>\n";
                echo"</tr>\n";
                echo"</tbody>\n";

            }
            echo "</table>\n";
            echo "</div>\n";
            echo "</div>\n";
            echo "</div>\n";

        }
?>
  </body>
  </html>