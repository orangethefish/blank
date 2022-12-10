<?php
include 'db_connection.php';
$conn = OpenCon();
$query ="SELECT * FROM `products`";
//echo "Connected Successfully";
$result=$conn->query($query);
//if ($result->num_rows > 0)
//{
//    // OUTPUT DATA OF EACH ROW
//    while($row = $result->fetch_assoc())
//    {
//        echo "Roll No: " .
//            $row["id"]. " - Name: " .
//            $row["name"]. " | Description: " .
//            $row["description"]. " | Price: " .
//            $row["price"]. " | Image: " ."<br>";
//    }
//}
//else {
//    echo "0 results";
//}
//CloseCon($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="news.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <title>News</title>
</head>

<body>
    
    <div class="container-fluid sticky-top px-0 bg-light">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 text-left">
                    <div class="hiddencanvas">
                        <a class="btn btn-white " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                            aria-controls="offcanvasExample">
                            <div class="menu-icon"></div>
                            <div class="menu-icon"></div>
                            <div class="menu-icon"></div>
                        </a>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                            aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <!-- <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5> -->
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div>
                                    <ul class="firstul border-bottom">
                                        <a href="" class="row p-2 my-3 text-dark ">FASHION</a>
                                        <a href="" class="row p-2 my-3 text-dark ">BEAUTY</a>
                                        <a href="" class="row p-2 my-3 text-dark ">CULTURE</a>
                                        <a href="" class="row p-2 my-3 text-dark ">LIVING</a>
                                        <a href="" class="row p-2 my-3 text-dark ">RUNWAY</a>
                                        <a href="" class="row p-2 my-3 text-dark ">SHOPPING</a>
                                        <a href="" class="row p-2 my-3 text-dark ">VIDEO</a>
                                        <a href="" class="row p-2 my-3 text-dark ">VOGUE CLUB</a>
                                        <a href="" class="row p-2 my-3 text-dark ">PHOTOVOGUE</a>
                                    </ul>
                                </div>
                                <div class="">
                                    <ul class="secul border-bottom">
                                        <a href="" class="row p-2 my-2 text-dark ">Seach</a>
                                        <a href="" class="row p-2 my-2 text-dark ">Sign In</a>
                                        <a href="" class="row p-2 my-2 text-dark ">Subscribe</a>
                                        <br>
                                        <a href="" class="row p-2 my-2 text-dark ">Vogue.com</a>
                                        <a href="" class="row p-2 my-2 text-dark ">Vogue Forces of Fashion</a>
                                        <a href="" class="row p-2 my-2 text-dark ">Vogue Archive</a>
                                        <a href="" class="row p-2 my-2 text-dark ">Vogue Podcast</a>
                                        <a href="" class="row p-2 my-2 text-dark ">Masterhead</a>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="d-flex justify-content-center thirdul">
                                        <i class="fa fa-facebook-f px-3" style="font-size:2rem;color:black"></i>
                                        <i class="fa fa-twitter px-3" style="font-size:2rem;color:black"></i>
                                        <i class="fa fa-pinterest px-3" style="font-size:2rem;color:black"></i>
                                        <i class="fa fa-instagram px-3" style="font-size:2rem;color:black"></i>
                                        <i class="fa fa-youtube-play px-3" style="font-size:2rem;color:black"></i>
                                    </ul>
                                </div>
                                <!-- <div class="dropdown mt-3">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                Dropdown button
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                              </ul>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <img src="./Vogue_logo.svg" alt="logo" height="35px">
    
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a href="#" class="text-dark px-3 button">SIGN IN</a>
                    <a href="#" class="text-dark px-3 button">SUBSCRIBE</a>
                    <a class="text-dark" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="mx-3">
                            <circle cx="10.5" cy="10.5" r="7.5"></circle>
                            <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </header> 
    </div>
    <!--Section: News of the day-->
    <div class="card d-flex mx-auto" style="width: 75%">
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
                    <tr>
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
    
    <!--Section: News of the day-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>