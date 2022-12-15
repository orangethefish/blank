<?php
include 'db_connection.php';
require_once('session.php');
session_start();
if (isset($_SESSION['current_user'])) {
    $current_user = unserialize($_SESSION['current_user']);
}else{
    $current_user=new User();
}
$conn = OpenCon();
$query ="SELECT * FROM `product_testing_news`";
//echo "Connected Successfully";
$result=$conn->query($query);
// if ($result->num_rows > 0)
// {
//    // OUTPUT DATA OF EACH ROW
//    while($row = $result->fetch_assoc())
//    {
//        echo "Roll No: " .
//            $row["id"]. " - Name: " .
//            $row["author"]. " | Description: " .
//            $row["headline"]. " | Price: " .
//            $row["detail"]. " | Image: " ."<br>";
//    }
// }
// else {
//    echo "0 results";
// }
// CloseCon($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,600&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,900&display=swap" rel="stylesheet">            
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./font/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="news.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <title>News</title>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <!--Section: News of the day-->
    <section class="vh-100 bg-image"
  style="background-color: #8fc4b7;">
    <div class="card d-flex mx-auto my-5 bg-white" style="width: 75%">
        <div class="card-body">
            <!--Table-->
            <table class="table-responsive">
            </table>
            <table class="table table-hover table-forum text-center">
                <!--Table head-->
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-left">Topic</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                    <?php
                        if ($result->num_rows > 0){
                        // OUTPUT DATA OF EACH ROW
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo '<td scope="row" class="text-nowrap">
    
                            <a href="detail.php?id=' . $row['id'] . '" type="button" class="btn btn-outline-dark-green btn-sm p-1 m-0 waves-effect">
                                <span class="value">'.$row['like_count'].'</span>
                                <i class="fas fa-thumbs-up ml-1"></i>
                            </a>
                            <a href="detail.php?id=' . $row['id'] . '" button" class="btn btn-outline-primary btn-sm p-1 m-0 waves-effect">
                                <span class="value">'.$row['dislike_count'].'</span>
                                <i class="fas fa-thumbs-down ml-1"></i>
                            </a>
                        </td>';
                            echo '<td class="text-start">
                            <a href="detail.php?id=' . $row['id'] . '" class="font-weight-bold text-success">',$row['headline'].'</a>';
                            echo '<div class="my-2">
                                <span class="text-dark">
                                <strong>' . $row['author'] . '</strong></span>';
                            echo '<span> ' . $row['date'] . '</span>';
                            echo '</div>';
                            echo '</td>';

                            echo '<td>
                            <a href="detail.php?id=' . $row['id'] . '" class="text-dark">
                                <span>'.$row['comment_count'].'</span>
                                <i class="fas fa-comments ml-1"></i>
                            </a>
                            </td>';
                        }
                        }else {
                        echo "No headlines!";
                        }
                        CloseCon($conn);
                    ?>
                    <!-- <tr>
                        <td scope="row" class="text-nowrap">
    
                            <a href="#" type="button" class="btn btn-outline-dark-green btn-sm p-1 m-0 waves-effect">
                                <span class="value">0</span>
                                <i class="fas fa-thumbs-up ml-1"></i>
                            </a>
                            <a href="#" button" class="btn btn-outline-primary btn-sm p-1 m-0 waves-effect">
                                <span class="value">0</span>
                                <i class="fas fa-thumbs-down ml-1"></i>
                            </a>
                        </td>
                        <td class="text-start">
                            <a href="#" class="font-weight-bold text-success">
                                Styling in the Shadow DOM With CSS Shadow Parts
                            </a>
                            <div class="my-2">
                                <a href="#" class="text-success">
                                    <strong>MDBootstrap</strong>
                                </a>
                                <span class="badge bg-secondary mx-1">staff</span><span
                                    class="badge bg-primary mx-1">pro</span><span
                                    class="badge bg-warning mx-1">premium</span>
                                <span>a year ago</span>
                                <div></div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="text-dark">
                                <span>0</span>
                                <i class="fas fa-comments ml-1"></i>
                            </a>
                        </td>
                    </tr>
                     -->
                </tbody>
                <!--Table body-->
            </table>
    
            <!-- Table -->
    
            <!--Bottom Table UI-->
            <div class="d-flex justify-content-center ">
                <!--Pagination -->
                <nav class="my-2 pt-2">
                    <ul class="pagination pagination-circle pg-info mb-0">
                        <!--First-->
                        <li class="page-item clearfix d-none d-md-block">
                            <a href="#" class="page-link waves-effect">
                                First </a>
                        </li>
                        <!--Arrow left-->
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">
                                    Previous </span>
                            </a>
                        </li>
                        <!--Numbers-->
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect">11</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect">12</a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link waves-effect">13</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect">14</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect">15</a>
                        </li>
                        <!--Arrow right-->
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <!--First-->
                        <li class="page-item clearfix d-none d-md-block">
                            <a href="#" class="page-link waves-effect">
                                Last </a>
                        </li>
                    </ul>
                </nav>
                <!--/Pagination -->
            </div>
            <!--Bottom Table UI-->
        </div>
    </div>
    </section>
    <footer
              class="text-center text-lg-start pt-5 pb-3 text-white"
              style="background-color: #272727"
              >
        <!-- Grid container -->
        <div class="container p-0 pb-0">
          <!-- Section: Links -->
          <section class="">
            <!--Grid row-->
            <div class="row">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-3">
                <div class="text-uppercase mb-4 font-weight-bold">
                  <div class="container__logofooter ms-4 ms-sm-0">
                    <img class="img_footer" src="./ pictures/logo_footer.jpg" alt="">
                    <h2>Candleaf</h2>
                  </div>
                  
                </div>
                <p>
                  Your natural candle made for your home and for your wellness.
                </p>
              </div>
              <!-- Grid column -->
    
              <hr class="w-100 clearfix d-md-none" />
    
              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold color--primary">Discovery</h6>
                <p>
                  <a class="text-white">New season</a>
                </p>
                <p>
                  <a class="text-white">Most searched</a>
                </p>
                <p>
                  <a class="text-white">Most selled</a>
                </p>
    
              </div>
              <!-- Grid column -->
    
              <hr class="w-100 clearfix d-md-none" />
    
              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold color--primary">
                  About
                </h6>
    
                <p>
                  <a class="text-white">Help</a>
                </p>
                <p>
                  <a class="text-white">Shipping</a>
                </p>
                <p>
                  <a class="text-white">Affiliate</a>
                </p>
              </div>
    
              <!-- Grid column -->
              <hr class="w-100 clearfix d-md-none" />
    
              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold color--primary">Info</h6>
                <p><i class="fas fa-home mr-3"></i>  Terms & Conditions </p>
                <p><i class="fas fa-envelope mr-3"></i>  Gmail</p>
                <p><i class="fas fa-phone mr-3"></i>  Contact us</p>
              </div>
              <!-- Grid column -->
            </div>
            <!--Grid row-->
          </section>
          <!-- Section: Links -->
    
          <hr class="my-3">
    
          <!-- Section: Copyright -->
          <section class="p-3 pt-0">
            <div class="row d-flex align-items-center">
              <!-- Grid column -->
              <div class="col-md-7 col-lg-8 text-center text-md-start">
                <!-- Copyright -->
                <div class="p-3">
                  ©Candleaf 
                  <a class="text-white" href="https://mdbootstrap.com/"
                     >All Rights Reserved.</a
                    >
                </div>
                <!-- Copyright -->
              </div>
              <!-- Grid column -->
    
              <!-- Grid column -->
              <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                <!-- Facebook -->
                <a
                   class="btn btn-outline-light btn-floating m-1"
                   class="text-white"
                   role="button"
                   ><i class="fab fa-facebook-f"></i
                  ></a>
    
                <!-- Twitter -->
                <a
                   class="btn btn-outline-light btn-floating m-1"
                   class="text-white"
                   role="button"
                   ><i class="fab fa-twitter"></i
                  ></a>
    
                <!-- Google -->
                <a
                   class="btn btn-outline-light btn-floating m-1"
                   class="text-white"
                   role="button"
                   ><i class="fab fa-google"></i
                  ></a>
    
                <!-- Instagram -->
                <a
                   class="btn btn-outline-light btn-floating m-1"
                   class="text-white"
                   role="button"
                   ><i class="fab fa-instagram"></i
                  ></a>
              </div>
              <!-- Grid column -->
            </div>
          </section>
          <!-- Section: Copyright -->
        </div>
        <!-- Grid container -->
        </footer>
      <!-- Footer -->
    <!--Section: News of the day-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>