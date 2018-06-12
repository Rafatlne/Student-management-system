<?php 
 ?>

 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                <a class="navbar-brand" href="#">AdminPanel</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Dashboard</a></li>
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
                    echo '<li><a href="logout.php">Logout</a></li>';  
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
                    <h1><span class="glyphicon glyphicon-cog" ></span> Dashboard <small>Manage your site</small></h1>
                </div>
                <div class="col-md-2 create">
                       <a href="create.php"> <button class="btn btn-default" type="button">
                            Add <i class="fas fa-plus"></i>
                        </button></a>
                </div>
            </div>
        </div>
    </header>
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="index.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</a>

                        <a href="student/tFooter.php" class="list-group-item"><i class="fas fa-users"></i>  Students</a>
                        
                        <a href="teacher/tFooter.php" class="list-group-item"><i class="fas fa-user"></i> Teacher</a>
                        <a href="course/tFooter.php" class="list-group-item"><i class="fas fa-sitemap"></i> Course </a>
                        
                        <a href="attendance/course_view.php" class="list-group-item"><i class="fas fa-tasks"></i> Attendance</a>
                        
                    </div>
                </div>
                <!-- website overview-->
                <div class="col-md-9">
                    
                    <div class="panel panel-default ">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Website Overview</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-4">
                                <div class="well dash-box">
                        <?php 
                                include_once 'config/database.php';
                                $query = "SELECT COUNT(*) as total_rows FROM student";
                                $stmt = $con->prepare($query);

                                $stmt->execute();
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                $total_rows = $row['total_rows'];
                                echo "<h2> <i class='fas fa-users'></i> ".$total_rows."</h2>";
                        ?>
                                    <h4>Students</h4>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="well  dash-box">
                        <?php 
                                include_once 'config/database.php';
                                $query = "SELECT COUNT(*) as total_rows FROM teacher";
                                $stmt = $con->prepare($query);

                                $stmt->execute();
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                $total_rows = $row['total_rows'];
                                echo "<h2> <i class='fas fa-user'></i> ".$total_rows."</h2>";
                        ?>
                                    <h4>Teachers</h4>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="well dash-box">
                        <?php 
                                include_once 'config/database.php';
                                $query = "SELECT COUNT(*) as total_rows FROM course";
                                $stmt = $con->prepare($query);

                                $stmt->execute();
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                $total_rows = $row['total_rows'];
                                echo "<h2> <i class='fas fa-sitemap'></i> ".$total_rows."</h2>";
                        ?>
                                    <h4>Course</h4>
                                </div>
                            
                            </div>

                        </div>
                    </div>
          <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Latest Admin</h3>
                        </div>
                    </div>
