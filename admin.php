<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CaraArt | Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <link class="img-responsive logo img-circle margin" rel="icon" href="Resources/logo.jpg">
    <style>
        html body{
            background: #D3D3D3;
        }

        .logoImg{
            padding-top: 7%;
        }

        .cards:hover {
            box-shadow: 8px 8px 8px #e1e1ff;
            transform: scale(1.05);
            transition: transform .4s;
        }
        .cards{
            border: #d4af37;
            margin-top: 60%;
        }


        #info-title{
            text-align: center;
            font-family: Garamond, serif;
            padding-bottom: 3%;
        }

        #title{
            font-family: 'ABeeZee', sans-serif;
        }


       #errMesg{
           color: red;
       }
       #cred{
           padding-top: 5%;
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

        #title{
            margin-top: 10% ;
            text-align: center;
        }

       .submit:hover:after {
            animation shine 1.6s ease
        }
        .submit:active {
            transform translateY(1px) ;
            box-shadow 0 4px 16px ;
        }



    </style>
    <script>
        function checkForm() {
            let password = document.forms["passForm"]["password"];
            password.style.background = "white";

            if (password.value === "") {
                alert("Please enter your password!");
                password.style.background = "pink";
            }

        }
    </script>
</head>
<body>
<?php
include "./navigationBar.html";
?>
<?php
    $password = strip_tags(isset($_POST['password'])? $_POST['password'] : "");

    if($password != "caraART21"){
        ?>

    <div class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="img-responsive">
                    <img class="logoImg"  src="Resources/logo.jpg" alt="logo">
                    </div>
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form name="passForm" action="admin.php" method="post" onsubmit="return checkForm();">
                        <h1 id="info-title"> Hi Cara, please enter your admin credentials</h1>
                        <div class="form-floating mb-4">
                           <h4 id="cred">Password</h4>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Your Password" />
                            <?php
                                if($password != ""){
                                    echo"<p id='errMesg'><b>Incorrect password, please try again</b></p>";
                                } ?>
                        </div>
                        <button type="submit" class="btn submit btn-lg btn-block">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    } else {
    ?>
<div class="container mt-5 mb-3">
    <h1 id="title">Welcome Cara, time to track and improve your business</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card cards p-3 mb-2">
                <div class="mt-5">
                    <h3 class="heading">Orders</h3>
                    <a href="showOrders.php" class="stretched-link">View</a>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card cards p-3 mb-2">
                <div class="mt-5">
                    <h3 class="heading">Appointments</h3>
                    <a href="showAppointments.php" class="stretched-link">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card cards p-3 mb-2">
                <div class="mt-5">
                    <h3 class="heading">Add New Painting</h3>
                    <a href="upload.php" class="stretched-link">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

</body>
</html>