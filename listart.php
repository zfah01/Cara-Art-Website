<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CaraArt | Gallery</title>
    <link class="img-responsive logo img-circle margin" rel="icon" href="Resources/logo.jpg">
    <style>
        html body{
            background: #D3D3D3;
        }

        .container-fluid {
            background: #D3D3D3;
        }
        img{
            display: inline-block;
            width: 350px;
            height: 350px;
            text-align: center;
            padding: 10px;
        }

        .card:hover {
            box-shadow: 8px 8px 8px #e1e1ff;
            transform: scale(1.05);
            transition: transform .4s;
        .card{
            border: #d4af37;
        }
        }
        .col-6 {
            padding-top: 9%;
        }
        .row{
            padding-left: 2%;
            padding-right: 2%;
        }


    </style>
</head>

<body>
<?php
include "./navigationBar.html";
?>

<div>
    <?php
    require_once "/home/wsb19173/DEVWEB/2021/zsyterombjjbihu/password.php";
    $host = "devweb2021.cis.strath.ac.uk";
    $username="wsb19173";
    $password= get_password();
    $dbname="wsb19173";
    $conn = new mysqli($host,$username,$password,$dbname);

    if (isset($_GET['pageNum'])) {
        $pageNum = $_GET['pageNum'];
    } else {
        $pageNum = 1;
    }

    $recordsPerPage = 12;
    $offset = ($pageNum - 1) * $recordsPerPage;

    $getTotalPages = "SELECT COUNT(*) FROM `artListings`";
    $returnTotalPages = $conn->query($getTotalPages);
    $totalRows = mysqli_fetch_array($returnTotalPages)[0];
    $totalPages = ceil($totalRows / $recordsPerPage);

    $sql = "SELECT * FROM `artListings` LIMIT $offset, $recordsPerPage";
    $fetchData = $conn->query($sql);

    echo '<div class="container-fluid body-content">
  <div class="row">';
    echo '<div class="row">';

    while($row = mysqli_fetch_array($fetchData)){

        echo '
    <div class="col-6 col-md-4 col-lg-3 mb-4">
      <div class="card card-cascade wider text-center h-100">
      <div class="view view-cascade overlay">
        <img class="card-img-top" alt="Art Piece" src="data:image/jpeg;base64,' . base64_encode($row['art-piece']) . ' "/>
      </div>
        <div class="card-body">
          <h2 class="card-title"><span class="fa fa-external-link mr-1"></span>
          <h4> ' . $row['name'] . ' </h4>
          </h2>
              <p><h7> £' . $row['price (£)'] . ' </h7></p>
              <form method="post" action="artDetails.php">
                    <input type="submit" name="action" value="More" id="submit"/>
                      <input type="hidden" name="id" value= "' . $row['id'] . '" />
                   </form>
        </div>
      </div>
    </div>';

    }
    $conn->close();
    ?>
</div>
<div id="pagination" style="width: 340px; margin-left: auto; margin-right: auto;">
    <nav aria-label="Page navigation">
        <ul class="pagination" class="pagination">

            <li class="page-item"><a class="page-link" href="<?php if ($pageNum <= 1) {
                    echo '#';
                } else {
                    echo "?pageNum =" . ($pageNum - 1);
                } ?>">Previous</a></li>
            <?php
            if ($pageNum == 1) {
                ?>

                <li class="page-item disabled"><a class="page-link" href="<?php echo '#'; ?>">1</a></li>
                <li class="page-item"><a class="page-link"
                                         href="<?php echo "?pageNum=" . ($pageNum + 1); ?>"><?php echo $pageNum + 1 ?></a></li>
                <li class="page-item"><a class="page-link"
                                         href="<?php echo "?pageNum=" . ($pageNum + 2); ?>"><?php echo $pageNum + 2 ?></a></li>
                <?php
            } else if ($pageNum == $totalPages) {
                ?>

                <li class="page-item"><a class="page-link"
                                         href="<?php echo "?pageNum=" . ($pageNum - 2); ?>"><?php echo $pageNum - 2 ?></a></li>
                <li class="page-item"><a class="page-link"
                                         href="<?php echo "?pageNum=" . ($pageNum - 1); ?>"><?php echo $pageNum - 1 ?></a></li>
                <li class="page-item disabled"><a class="page-link"
                                                  href="<?php echo "?pageNum=" . ($pageNum + 2); ?>"><?php echo $pageNum ?></a>
                </li>
                <?php
            } else {
                ?>
                <li class="page-item"><a class="page-link"
                                         href="<?php echo "?pageNum=" . ($pageNum - 1); ?>"><?php echo $pageNum - 1 ?></a></li>
                <li class="page-item disabled"><a class="page-link" href="<?php echo '#'; ?>"><?php echo $pageNum ?></a></li>
                <li class="page-item"><a class="page-link"
                                         href="<?php echo "?pageNum=" . ($pageNum + 1); ?>"><?php echo $pageNum + 1 ?></a></li>

                <?php
            }
            ?>
            <li class="page-item"><a class="page-link" href="<?php if ($pageNum >= $totalPages) {
                    echo '#';
                } else {
                    echo "?pageNum=" . ($pageNum + 1);
                } ?>">Next</a></li>

        </ul>
    </nav>
</div>
</body>

</html>
