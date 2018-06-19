<!DOCTYPE html>
<html lang="en">

<?php
include ('header.php');

$error=(isset($_GET['error'])) ? $_GET['error'] : "";
//echo $error;
if ($error==1){
	$message="Invalid login. Please try again.";
}elseif ($error==2){
	$message="You have no authority to log on.";
}else{
	$message="3";
}


?>
<?php
if ($error<>''){?>
 <script >
 alert (<?php echo $message?>)
 </script>
<?php }?>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
 <form name="form1" method="post" action="checklogin.php">


                    <div class="panel-heading">
                        <h3 class="panel-title"><img src="img/logo_uthm_2.png"></h3>
                    </div>

                            <fieldset>
                                <div class="form-group">
                                   &nbsp;No Matrik/Staf  : &nbsp;<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                   &nbsp;No Kad Pengenalan : &nbsp;<input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
        
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="login" class="btn btn-success">Log Masuk</button>
                            </fieldset>
                 
  

</form>
</body>

</html>
