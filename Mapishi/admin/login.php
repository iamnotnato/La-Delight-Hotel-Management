
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>MAPISHI | LOGIN </title>
    <link rel="shortcut icon" href="images/icon.png">
    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/material.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 
</head>
  
<body>
   <div class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light"
    data-src="images/test.png" href="home" uk-img>
</div>
<center><h4>LOGIN</h4></center>
<div class="uk-child-width-1-1@s uk-grid-collapse uk-text-center" uk-grid>
    <div>
        <div class="uk-tile uk-tile-default">
           <form action="" method="post" class=" uk-inline">
    <div class="uk-margin">
      <label class="uk-inline">Username</label>
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: user"></span>
            <input class="uk-input" type="text" name="user">
        </div>
    </div>
<div class="uk-margin">
  <label class="uk-inline">Password</label>
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" type="password" name="pass">
        </div>
    </div>
    <center></center>
    <br>
 <center><input class="uk-button uk-button-default uk-button-small" type="submit" value="Login" name="submit">

</form>
<?php
if(isset($_POST["submit"])){
	if(!empty($_POST['user']) && !empty($_POST['pass'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
    	$db = mysqli_select_db($conn, 'mapishi_poa') or die("DB Error");
    	$query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."' and pass='".$pass."'");
    	$numrows = mysqli_num_rows($query);
    	if($numrows !=0)
    	{
    		while($row = mysqli_fetch_assoc($query))
    		{
    			$dbusername = $row['user'];
    			$dbpassword = $row['pass'];
    		}
    		if($user == $dbusername && $pass == $dbpassword)
    		{
    			session_start();
    			$_SESSION['sess_user']=$user;
    			header("Location: shopping-index.php");
    		}
    	}
    	else
    	{
            echo "Incorrect Login Details";
  
    	}
    }
    else
    {
    	echo "All fields required";
    }
}
?>

        </div>
    </div>
    <div>
                  <nav class="uk-navbar-container-default uk-margin" uk-navbar>
    <div class="uk-navbar-center">

        <div class="uk-navbar-center-left"><div>
            <ul class="uk-navbar-nav">
                <li><a href="#">BLOG </a></li>
                <li><a href="#">ABOUT</a></li>
            </ul>
        </div></div>
                <a class="uk-navbar-item uk-logo" href="shop">SHOP
              </a>
        <div class="uk-navbar-center-right"><div>
            <ul class="uk-navbar-nav">
                <li><a href="#">SOUV</a></li>
                <li><a href="login">LOGIN</a></li>
            </ul>
        </div></div>
    </div>
</nav>
</div>
</div>
 <div id="modal-close-default" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <h6>Incorrect Credentials</h6>
            <p>Kindly Check Your Login Details</p>
             </div>
            </div>
  <script type="text/javascript" src="js/uikit.min.js"></script>
<script type="text/javascript" src="js/uikit-icons.js"></script>
    <script type="text/javascript" src="js/material.min.js"></script>

</body>

</html>
