
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
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php'); 
 
    try{
     
        // insert query
        $query = "INSERT INTO student SET sName=:sName, gender=:gender,s_id=:s_id,contact=:contact,batch=:batch";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $sName=htmlspecialchars(strip_tags($_POST['sName']));
        $s_id=htmlspecialchars(strip_tags($_POST['s_id']));
        $contact=htmlspecialchars(strip_tags($_POST['contact']));
        $gender=htmlspecialchars(strip_tags($_POST['gender']));
        $batch=htmlspecialchars(strip_tags($_POST['batch']));
 
        // bind the parameters
        $stmt->bindParam(':sName', $sName);
        $stmt->bindParam(':s_id', $s_id);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':batch', $batch);
         
 
         
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
        <tr>
            <td>Name</td>
            <td><input type='text' name='sName' class='form-control' required /></td>
        </tr>
    <div class="form-group">
        <tr>
            <td>ID</td>
            <td><input type="text" name='s_id' class='form-control' required/></td>
        </tr>
    </div>
    <div class="form-group">
        <tr>
            <td>Gender</td>
            <td><input type="text" name='gender' class='form-control' required/></td>
        </tr>
    </div>
    <div class="form-group">
        <tr>
            <td>Contact</td>
            <td><input type="text" name='contact' class='form-control' required/></td>
        </tr>
    </div>
        <tr>
            <td>Batch</td>
            <td><input type='text' name='batch' class='form-control' required style="width: 300px;"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='tFooter.php' class='btn btn btn-danger'>Back to read products</a>
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