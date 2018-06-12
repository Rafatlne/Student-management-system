<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Products</h1>
        </div>
     <!--- -->

         </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- confirm delete record will be here -->
<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    } 
}
</script>
 
</body>
</html>

<!-- tFooter.php -->
<!-- tFooter.php -->
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
                    <li><a href="../index.php">Dashboard</a></li>
                    <li><a href="../student.php">FAQ</a></li>
                    <li><a href="../exam.php">Terms of Service </a></li>
                    <li><a href="teacher.php">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Welcome, Rafat</a></li>
                    <li><a href="../login.php">Logout</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Teacher<small> Manage Teacher</small></h1>
                                <div class="col-md-2">
                    <div class="create">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Add <i class="fas fa-plus"></i>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenu1">
                            <li><a type="button" href="create.php">Add teacher</a></li>
                            <li><a type="button" >Enroll Course</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <!-- Here is the changes -->
                <li><a href="index.php">Dashboard</a></li>
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
                        <a href="../student/tFooter.php" class="list-group-item"><i class="fas fa-users"></i>  Students <span class="badge">140</span></a>
                        <a href="tFooter.php" class="list-group-item"><i class="fas fa-user"></i> Teacher <span class="badge">10</span></a>
                        <a href="../course/tFooter.php" class="list-group-item"><i class="fas fa-sitemap"></i> Course <span class="badge">4</span></a>
                        
                        
                        <a href="../attendance/attendance.php" class="list-group-item"><i class="fas fa-tasks"></i> Attendance</a>
                        
                    </div>
                </div>
                <!-- Website Overview was deleted -->
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Teacher</h3>
                            <!-- Here is the Changes -->
                        </div>
                        <div class="panel-body"

