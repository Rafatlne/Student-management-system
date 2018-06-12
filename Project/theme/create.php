
<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
<?php
	if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO admin SET Password=:Password, Admin_ID =:Admin_ID";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $Password=htmlspecialchars(strip_tags($_POST['Password']));
        $Admin_ID=htmlspecialchars(strip_tags($_POST['Admin_ID']));
 
        // bind the parameters
        $stmt->bindParam(':Password', $Password);
        $stmt->bindParam(':Admin_ID',$Admin_ID);
         
        // specify when this record was inserted to the database
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!-- html form here where the product information will be entered -->
<div class="panel-body">
    <div class="panel-body">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
    <div class="form-group">
        <tr>
            <td>Username</td>
            <td><input type="text" name='Admin_ID' class='form-control' required/></td>
        </tr>
    </div>
        <tr>
            <td>Password</td>
            <td><input type='text' name='Password' class='form-control' required /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
    </div>      
</div> <!-- end .container -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>