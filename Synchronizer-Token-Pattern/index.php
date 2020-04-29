<?php

    session_start();
    require_once 'Classes/Token.php';

    //Creating the cookie
    setcookie("name","Admin",time() + 18000 );
    

    $error="";
    $success="";

    if(isset($_POST['username'])) {
        $uname = $_POST['username'];
    }

    if(isset($_POST['password'])) {
        $pass = $_POST['password'];
    }

    //Checking username and password
    if(isset($_POST['submit'])){
        if($uname == "admin"){
            if($pass == "1234"){

                $_SESSION['username'] = "Admin";
                $_SESSION['start']= time();
                            
                //Taking Logged In Times
                $_SESSION['expire']= $_SESSION['start'] + (1 * 5);
                header('Location: login.php');

                $token = Token::generate(session_id());
			    setcookie("id", session_id());
			    setcookie("token", $token);
            }
            
            //Display Error message when user input the wrong password  
            else{
                $error = "Invalid or Wrong Password!!!";
                $success = "";
            }
        }
            //Display Error message when user input the wrong username 
            else{

            $error = "Invalid or Wrong Username!!!";
            $success = "";
            
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<style> 
body {
  background-image: url("img/2.jpeg");
}
</style>

<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>




    <h4 class="text-center text-white">IE2062-Web Security || IT18208740 S.A.C.T.D.Perera </h4><br>
    <h5 class="text-center text-white">Username=admin  Password=1234 </h5><br>
    <section class="container-fluid bg img-responsive">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <h1 class="text-center text-white">Synchronizer Token Pattern</h1>
                <form method="POST" class="form-con">
                    
                    <div class="form-group">
                    <p style = "text-align:center" class="error" ><?php echo $error; ?><p class="success"><?php echo $success; ?></p>
                    <h2 style = "text-align:center "><b>Online Banking</b></h2>
                       <h2 style = "text-align:center "><b>Login</b></h2><br>
                        <label for="un1">Username</label>
                        <input type="text" name="username" type="username" class="form-control" aria-describedby="Username Help">
                    </div>

                    <div class="form-group">
                        <label for="pw1">Password</label>
                        <input type="password" name="password"  type="username" class="form-control" id="pw1">
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="Check1">Remember me
                        <label class="form-check-label" for="Check1"> </label>
                        </br>
                        </br><a href="#">Forget your password ?</a></br>
                        </br>
                        <a href="#">Don't you have an account? Sign up now</a></br>
                    </div>
                    
                    
                    <button type="submit" name="submit"   class="btn btn-primary btn-block">Submit</button>
                    
                </form>

            </section>
        </section>
    </section>
    
    





</html>