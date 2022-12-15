<?php
include 'db_connection.php';
require_once('session.php');
$current_user = new User();
$_SESSION['current_user'] = serialize($current_user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,600&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,900&display=swap" rel="stylesheet">            
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./font/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>



<body>
<!-- Responsive navbar-->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
</nav> -->

 <section class="vh-100 bg-image"
  style="background-color: #8fc4b7;">
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
    <div class="box-login">
        <form class="form-login" method="POST" action="">
            <fieldset>
                <legend>
                    Sign in to your account
                </legend>
                <p>
                    Please enter your email and password to log in.<br/>
                </p>
<?php
session_start();
// define variables and set to empty values
if(strcmp($current_user->getUser(),"unset")==0){
    // header("Location: news.php");
}
$email = $password = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = OpenCon();
    $query ="SELECT * FROM `user_info`";
    //echo "Connected Successfully";
    $result=$conn->query($query);
    $email = valid_email($_POST["email"])?$_POST["email"]:"unset";
    $password = valid_password($_POST["password"])?$_POST['password']:"0";
    if ($result->num_rows > 0)
    {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
            
            if(strcmp($row['username'], $email)==0&&strcmp($row['password'], $password)==0){
                $current_user->setUser($email,$row['role'],$row['name']);
                $_SESSION['current_user'] = serialize($current_user);
                // echo "Login successfully.";
                header("Location: news.php");
                break;
            }
        }
        echo '<div class="text-danger">Wrong Email or Password!</div>';
    }   
    CloseCon($conn);  
}


function valid_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
        echo $emailErr;
        echo nl2br("\n");
        return false;
    }

    return true;

}

function valid_password($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 3) {
        echo '<div class="text-danger">Password should be at least 3 characters in length and should include at least one upper/lowercase character and one number.</div>';
        echo nl2br("\n");
        return false;
    }
    return true;
}
?>
                <div class="form-group">
                    <span class="input-icon">
                        <input id="email" type="text" class="form-control" name="email" placeholder="Email address">
                        <i class="fa fa-user"></i> </span>
                </div>
                <div class="form-group form-actions">
                    <span class="input-icon">
                        <input id="password" type="password" class="form-control password" name="password" placeholder="Password"><i
                            class="fa fa-lock"></i>
                    </span>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary pull-right" name="submit" onclick="">
                        Login <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>

            </fieldset>
        </form>
        <p id="status"></p>
        <p class="text-center text-muted mt-5 mb-0">Don't have one? <a href="sign_up.php"
                    class="fw-bold text-body"><u>Create now</u></a></p>
    </div>
</div>
</div>
</div>
</div>
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
 <!-- <footer class="py-5 bg-dark ">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer> -->
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>