<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<?php
$database_connexionLogin 	= "rbstravelcom_wafa";
$username_connexionLogin	= "rbstravelcom_wafa";
$password_connexionLogin	="wafa2018";  
$hostname_connexionLogin	= "localhost";
/*
$database_connexionLogin 	= "rbs_travel";
$username_connexionLogin	= "root";
$password_connexionLogin	= "";
$hostname_connexionLogin	= "localhost";

*/



$connexionLogin = @mysql_connect($hostname_connexionLogin, $username_connexionLogin, $password_connexionLogin) or trigger_error(mysql_error(),E_USER_ERROR); 
@mysql_select_db($database_connexionLogin, $connexionLogin) or die(mysql_error());
	
?>

<?php




if(isset($_POST['connect'])){
	session_start();


$sql=mysql_query("select * from admin where login='".$_REQUEST['login']."' and mot_de_passe='".md5($_REQUEST['pass'])."'");
	
	if(mysql_num_rows($sql)==1) $_SESSION['admin_connect']=md5($_REQUEST['pass']);
	
	}
if(!empty($_SESSION['admin_connect'])) header("location:index.php");
	
	?>
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="index.html" >
            <img class="center" alt="logo" src="img/logo.png" style=" margin-top:-20px;  height:75px;">
        </a>
        <!-- END LOGO -->
    </div>
    <div class="lock-wrap">
        <div class="metro single-size gray">
            <img src="img/photo.jpg" alt="" style="height: 165px" >
        </div>
                    <form  method="post">

        <div class="metro double-size green">
                <div class="input-append lock-input">
                    <input type="text" name="login" class="" placeholder="Username">
                </div>
        </div>
        <div class="metro double-size green">
                <div class="input-append lock-input">
                    <input type="password"  name="pass" class="" placeholder="Password">
                    <button type="submit" name="connect" class="btn tarquoise"><i class=" icon-arrow-right"></i></button>
                </div>
            </form>
        </div>
        
        
        
    </div>
</body>
<!-- END BODY -->
</html>