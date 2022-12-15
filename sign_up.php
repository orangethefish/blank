<?php
include 'db_connection.php';
require_once('session.php');
$current_user = new User();
function numcheck($value){
    $result = true;
    for($i = 0; $i < strlen($value); $i++){
        if(strcmp($value[$i],'0')==-1||strcmp($value[$i],'9')==1){
            $result = false;
        echo '<div class="text-danger">Phone must be all numbers</div>';
            break;
        }
    }
    return $result;
}
function valid_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = '<div class="text-danger">Invalid email format.</div>';
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
function duplicate_email($email){
    $conn = OpenCon();
    $result = true;
    $query ="SELECT * FROM `user_info`";
    //echo "Connected Successfully";
    $result=$conn->query($query);
    if ($result->num_rows > 0)
    {
   // OUTPUT DATA OF EACH ROW
   while($row = $result->fetch_assoc())
   {
       if(strcmp($email,$row['username'])==0){
                $result = false;
                echo '<div class="text-danger">Email is already taken</div>';
                break;
       }
   }CloseCon($conn);
        return $result;
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,600&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,900&display=swap" rel="stylesheet">            
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./font/fontawesome-free-6.2.1-web/css/all.min.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <title>Sign Up</title>
</head>

<body>
<nav class="row navbar">
              <div class="col-sm-3 col-5 d-flex justify-content-end">
                <img class="header--logo" src="./pictures/logo.jpg" alt="">
              </div>
              <div class="col-7 d-sm-flex d-none justify-content-center" >
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Discovery</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                  </li>
                </ul>
              </div>
              <div class="col-sm-2 col-3">
                <div class="position-relative d-flex align-items-center">
                  <a class="position-relative d-block color--primary text-decoration-none font-weight-bold  font-family-Roboto" href="../Main/checkout.php">
                
                    Đăng kí
                  
           
                  <label for="checkoverlay" class="header--menu d-inline-flex align-items-center   d-sm-none">
                    <i  class="header--menu fa-solid fa-bars header--icon"></i>
                  </label>
                  <input type="checkbox" hidden name="" id="checkoverlay">
                  <label for="checkoverlay" class="nav__overlay"></label>
                  <div class="nav__moblie ">
                    <label for="checkoverlay" >
                      <i class="menu__icon__close fa-regular fa-circle-xmark"></i>
                    </label>
                    <ul class="nav nav-list d-flex flex-column align-items-center mt-3">
                      <li class="nav-item nav-item__moblie ">
                        <a class="nav-link " aria-current="page" href="#">Active</a>
                      </li>
                      <li class="nav-item nav-item__moblie">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item nav-item__moblie">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
        </nav>
    <section class="vh-100 bg-image"
  style="background-color: #8fc4b7;">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "HI";
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['phone'])) {
            $email = $_POST['email'];
            $name=$_POST['name'];
            $password=$_POST['password'];
            $address=$_POST['address'];
            $phone = $_POST['phone'];
            if(valid_email($email) && valid_password($password)&&duplicate_email($email)){
                $conn = OpenCon();
                $sql = "INSERT INTO user_info (username, password, name, address,phone_no)
        VALUES ('$email', '".$password."','".$name."','".$address."','".$phone."')";
                if ($conn->query($sql) === TRUE) {
                //   echo "New record created successfully";
                ?><script> location.replace("login.php"); </script>
                 <?php
                } else {
                //   echo "Error: " . $sql . "<br>" . $conn->error;
                }
        CloseCon($conn);
        }
    }
}
?>
              <form method="POST">

                <div class="form-outline mb-4">
                  <input type="text" id="name" name="name" class="form-control form-control-lg" />
                  <label class="form-label" for="">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="name" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for=" ">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="address" id="name" name="address" class="form-control form-control-lg" />
                  <label class="form-label" for=" ">Address</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="name" name="phone" class="form-control form-control-lg" />
                  <label class="form-label" for=" ">Phone No</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id=" " name="password" class="form-control form-control-lg" />
                  <label class="form-label" for=" ">Password</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>