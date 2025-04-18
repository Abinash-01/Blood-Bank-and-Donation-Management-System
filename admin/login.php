<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('admin_image/3d-cinematic-water-splash-with-red-fire-navy-color-background.jpg'); 
             background-size: cover; 
             background-position: center; 
             background-repeat: no-repeat; 
             background-attachment: fixed;">

  <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container" style="margin-top:200px;">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h1 class="mt-4 mb-3" style="color: white; font-family: serif; text-shadow: 2px 2px 4px black;">
            Blood Bank & Management
            <br>Admin Login Portal
          </h1>
        </div>
      </div>
      <div class="card" style="background: rgba(255, 255, 255, 0.6); 
                         backdrop-filter: blur(4px); 
                         -webkit-backdrop-filter: blur(4px); 
                         border-radius: 15px; 
                         padding: 25px; 
                         box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3); 
                         max-width: 600px; 
                         margin: auto;">

        <div class="card-body">
          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-6 mb-6">
              <div class="font-italic" style="font-weight:bold">Username<span style="color:red">*</span></div>
              <div>
                <input type="text" name="username" placeholder="Enter your username" class="form-control" value="" required>
              </div>
            </div>
          </div>
          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-6 mb-6"><br>
              <div class="font-italic" style="font-weight:bold">Password<span style="color:red">*</span></div>
              <div>
                <input type="password" name="password" placeholder="Enter your Password" class="form-control" value="" required>
              </div>
            </div>
          </div>
          <div class="row justify-content-lg-center justify-content-mb-center">
            <div class="col-lg-4 mb-4 " style="text-align:center"><br>
              <div>
                <input type="submit" name="login" class="btn btn-primary" value="LOGIN" style="cursor:pointer">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <?php
      include 'conn.php';

      if(isset($_POST["login"])){

        $username=mysqli_real_escape_string($conn,$_POST["username"]);
        $password=mysqli_real_escape_string($conn,$_POST["password"]);

        $sql="SELECT * from admin_info where admin_username='$username' and admin_password='$password'";
        $result=mysqli_query($conn,$sql) or die("query failed.");

        if(mysqli_num_rows($result)>0)
        {
          while($row=mysqli_fetch_assoc($result)){
            session_start();
             $_SESSION['loggedin'] = true;
            $_SESSION["username"]=$username;
            header("Location: dashboard.php");
          }
        }
        else {
          echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
        }
      }
    ?>
  </form>
</body>
