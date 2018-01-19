<?php
session_start();

if(!$_SESSION['email'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

?>

<html>
<head>
    <link rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>
        Registration
    </title>

</head>

<body>
    <div class="navbar navbar-inverse">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
					<li class="divider-vertical"></li>
					<li class="active"><a href="#"><i class="icon-file icon-white"></i> Pages</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#"><i class="icon-envelope icon-white"></i> Messages</a></li>
					<li class="divider-vertical"></li>
                  	<li><a href="#"><i class="icon-signal icon-white"></i> Stats</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#"><i class="icon-lock icon-white"></i> Permissions</a></li>
					<li class="divider-vertical"></li>
				</ul>
                <div class="pull-right" style="padding-top:5px;">
                    <ul class="nav pull-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, User <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                                <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                                <li class="divider"></li>
                                <li><a href="/auth/logout"><i class="icon-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>   
                </div>
            </div>
            
			<!--/.nav-collapse -->
    </div

</div>
<!--/.navbar -->
<div align="center"> 
    <h1>Welcome</h1><br>
    <?php
    echo $_SESSION['email'];
    ?>


    <h1><a href="logout.php">Logout here</a> </h1>
</div>

</body>

</html>

