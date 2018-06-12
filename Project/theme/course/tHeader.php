<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Pages</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">AdminStrap</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../index.php">Dashboard</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Terms of Service </a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
            <?php  
                //login_success.php  
                    session_start();  
                    if(isset($_SESSION["username"]))  
                {  
                    echo '<li><a href="#">Welcome, '.$_SESSION["username"].'</a></li>';  
                    echo '<li><a href="../logout.php">Logout</a></li>';  
                 }  
                    else  
                    {  
                    header("../location:index.php");  
                    }  
                    ?> 
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Course<small> Manage Course</small></h1>
                </div>
                <div class="col-md-2 create">
                    <div class="dropdown create">

  <button class="dropbtn">Add   <i class="fas fa-plus"></i></button>
  <div class="dropdown-content">
    <a href="create.php">Add Course</a>
  </div>
</div>
                </div>
            </div>
        </div>
    </header>
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <!-- Here is the changes -->
                <li><a href="../index.php">Dashboard</a></li>
                <li class="active">Teacher</li>
                <!-- Until Here -->
            </ol>
        </div>
    </section>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="../index.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</a>
                        
                        <a href="../student/tFooter.php" class="list-group-item"><i class="fas fa-users"></i> Students</a>
                        
                        <a href="../teacher/tFooter.php" class="list-group-item"><i class="fas fa-user"></i> Teacher </a>
                        
                        <a href="tFooter.php" class="list-group-item"><i class="fas fa-sitemap"></i> Course</a>
                        
                       
                        
                        <a href="../attendance/course_view.php" class="list-group-item"><i class="fas fa-tasks"></i> Attendance</a>
                        

                    </div>
                </div>
                <!-- Website Overview was deleted -->
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Course</h3>
                            <!-- Here is the Changes -->
                        </div>
                        <div class="panel-body">

    