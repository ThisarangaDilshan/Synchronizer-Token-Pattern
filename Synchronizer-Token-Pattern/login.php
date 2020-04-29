<?php
session_start();
require_once 'Classes/Token.php';

$display_messsge = "";

if(isset($_POST['accountnumber'], $_POST['csrf_token'], $_POST['amount'], $_POST['accountname'])){

  $accountnumber = $_POST['accountnumber'];
  $csrf_token = $_POST['csrf_token'];
  $amount = $_POST['amount'];
  $accountname = $_POST['accountname'];

//Check whether the Account Number, Name, Amount, and csrf token fields are empty
  if(!empty($accountnumber) && !empty($accountname) && !empty($amount) && !empty($csrf_token))
  {
    if(Token::check($csrf_token))
    {
        //Display successfully change message
        echo "<script>alert('You have Transfered Money Successfully');</script>";
    }
    else if(!Token::check($csrf_token))
        //Display successfully not change message
        echo "<script>alert('Error...!!! Try Again.');</script>";
    }
  }

//When user trying to find indexes without using username and password, display this message
 if(!isset($_SESSION['username']))
{
    echo "<h2 align='center'>Can't transfer money from here. Go back to Login Page. <br> ";

    echo "<h2 align='center'> Click below link <br><br>";
 
    echo "<a href='index.php'> LOGIN </a></h2>";

}

else{
$now = time();
// checking the time now when home page starts

   if($now > $_SESSION['expire'])

   {

       session_destroy();

       echo "<h2 align='center'>Your session has expire ! <br><br> <a href='index.php'>Login Here</h2></p>";



   }

    
else
{

?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/welcome.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/testlogin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">


    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Destroy Session after 1 minutes </title>

</head>
<style> 
body {
  background-image: url("img/2.jpeg");
}
</style>

<body class="welcome_home img-responsive">
    <div style="width: 40rem;">
        <form action="logout.php" method="GET">

            <div class="alert danger-centers alert-dark" role="alert">
                <h3 class="card-title">Hello <?php echo $_SESSION['username']; ?>..!!</h3>
                </br>
                <h5 class="mb-3">Now you can transfer your money. If you don't want to do that, click on logout link</h5>
                <button type="submit" class="btn btn-danger btn-lg btn-block">Log Out</button></br>
                 
            </div>
        </form>
    </div> 
       
    s<section class="container-fluid" id = "scale">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form method="POST" class="form-con">
                    <div class="form-group">
                       <h2>Transfer Money</h2>
                        <label for="AN" style = "margin-top:20px">Account Number</label>
                        <input type="number" name="accountnumber" type="accountnumber" class="form-control"placeholder="XXXX XXXX XXXX" aria-describedby="Username Help">
                       
                    </div>

                    <div class="form-group">
                        <label for="AName" >Name</label>
                        <input type="text" name="accountname" type="accountname" class="form-control"placeholder="EX:John" aria-describedby="Username Help">    
                    </div>

                    <div class="form-group">
                        <label for="amount1">Amount</label>
                       
                        <input type="number" name="amount"  type="amount" placeholder="LKR:0.00" class="form-control" id="amount1"></br>
                       
                       
                        <input type="hidden" name="csrf_token" value="<?php echo Token::generate();?>">
                       
                        
                        <button type="submit" name="submit"  class="btn btn-primary btn-block">Transfer</button>
                    </div> 
                </form>
            </section>
        </section>
    </section>
  </div>
</div>
        


    </form>




    <br /><br />

    <span> </span>

    </p>

    <?php
    }
    
}   
    ?>

</body>

</html>