<!DOCTYPE html>
<html lang="en">

<head>

<style>
li.nav-item {
    padding: 2px;
}
img {
width: 100%;
}


    body{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
}
.contact-form{
        padding-top:60px;
		margin-bottom: 5%;
    width: 70%;
    }
    /* fix padding under menu after resize */
    @media screen and (max-width: 767px) {
        .contact-form { padding-top: 60px; }
    }
    @media screen and (min-width:768px) and (max-width: 991px) {
        .contact-form { padding-top: 110px; }
    }
    @media screen and (min-width: 992px) {
        .contact-form { padding-top: 60px; }
    }
.contact-form{
    background: #fff;
    margin-top: 5%;

}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 10%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: 2%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
.form-group
{
    PADDING: 5PX;
	}
	</style>

 <?php
error_reporting(0);


    include("db_connect.php");

        if(isset($_POST['submit'])){

            date_default_timezone_set("Asia/Kolkata");
            $date = date('Y-m-d H:i:s');

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $mobile_number = $_POST['mobile_number'];
            $email_id = $_POST['email_id'];
            $password = $_POST['password'];


            //CHECK IF USER ALREADY EXISTS
            $sql = "SELECT * FROM user_profile where (email_id = '$email_id' || mobile_number = '$mobile_number')";
            //echo $sql;
            $statement = $conn->prepare($sql);
            if(!$statement->execute()){//execute returns false if failed
                $returned_data['response_code'] = "-2";
                $returned_data['response_message'] = "Server error code -2(failed query)";
                echo json_encode($returned_data);
                exit();
            }

            if ($statement->rowCount() == 0){
                try{
                    $statement = $conn->prepare("INSERT INTO user_profile (first_name, last_name, mobile_number, email_id, password, user_is, created_at)
                    VALUES (:first_name, :last_name, :mobile_number, :email_id, :password, 0, '".$date."')");
                    $statement->bindValue(':last_name', $last_name);
                    $statement->bindValue(':first_name', $first_name);
                    $statement->bindValue(':mobile_number', $mobile_number);
                    $statement->bindValue(':email_id', $email_id);
                    $statement->bindValue(':password', $password);

                    if(!$statement->execute()){//execute returns false if failed
                        $returned_data['response_code'] = "-2";
                        $returned_data['response_message'] = "Server error code -2(failed query)";
                        echo json_encode($returned_data);
                        exit();
                    }

                    echo "<script>alert('Created account');</script>";
                }catch(Exception $e){
                    echo "<script>alert('Exception');</script>";
                    echo $e->getMessage();
                }
            }
            else{
                echo "<script>alert('Account already exists');</script>";
            }
        }




    ?>

    <meta charset="utf-8" />
    <title>TagnCash- Responsive Landing page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 5 Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />

   <!-- favicon -->
   <link rel="shortcut icon" href="/assets_home/images/favicon.ico" />


   <!-- tinyslider -->
   <link rel="stylesheet" href="/assets_home/css/tiny-slider.css" />

   <!-- css -->
   <link href="/assets_home/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <link href="/assets_home/css/style.min.css" rel="stylesheet" type="text/css" />
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="67">
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
        <div class="container">
            <a href="/" class="navbar-brand me-5">
                   <img src="/assets_home/images/logo.jpg" >

                </a>
            <a href="javascript:void(0)" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon"><i data-feather="menu"></i></span>
                </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-center me-auto mt-lg-0 mt-2">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#feature">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#faq">Referal</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="index.html#ref">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#service">Earn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#pricing">Network Stories</a>
                    </li>
					<li class="nav-item">
                       <a href="/home/referrer_signup" class="btn btn-sm nav-btn btn-primary mb-4 mb-lg-0 ms-auto" > Referar</a>
                    </li>
					<li class="nav-item">
                        <a href="/home/vendor_signup" class="btn btn-sm nav-btn btn-primary mb-4 mb-lg-0 ms-auto" > Vendor</a>
                    </li>

                </ul>

            </div>
        </div>
        <!-- end container -->
    </nav>
    <!-- end navbar -->

    <!-- start hero -->


  <Div class="container contact-form">

            <form method="post">
			                            <p class="margin-top-30 text-center">Already have an account? Sign in <a href="vendor_signin.php">here</a></p>
                <h3>Referrer Sign Up</h3>
               <div class="row">
			   <form class="form-auth-small" action="" method="POST">
                    <div class="col-md-6">
								<div class="form-group">

									<input class="form-control" id="first_name" name="first_name" placeholder="First Name">
								</div>
								<div class="form-group">

									<input class="form-control" id="last_name" name="last_name" placeholder="Last Name">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email ID">
								</div>
								</div>

                    <div class="col-md-6">
                                <div class="form-group">

									<input class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number">
								</div>
								<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
								<div class="form-group" onsubmit="return checkForm(this);">
					<input type="checkbox" id="myCheck" name="test" required> <a href="Term&condtion.html" target="_blank"> Terms and Conditions and Privacy Policy</a>

								</DIV>
								<div class="form-group">
									<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
								</div>
                    </div>
					</form>
                </div>

</div>

    <!-- end footer -->

    <!-- start footer alter -->
    <div class="footer-alt bg-dark">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; TagNCash
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end footer alter -->

    <script src="/assets_home/js/bootstrap.bundle.min.js"></script>

    <!-- feather icon -->
    <script src="/assets_home/js/feather.js"></script>

    <!-- client-slider -->
    <script src="/assets_home/js/tiny-slider.js"></script>
    <script src="/assets_home/js/tiny.init.js"></script>

    <!-- moving letter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="/assets_home/js/text-animation.init.js"></script>

    <script src="/assets_home/js/app.js"></script>

<script>


<script>
function myFunction() {
  var x = document.getElementById("myCheck").required;
  document.getElementById("demo").innerHTML = x;
}
</script>

</script>

</script>

</body>

</html>
