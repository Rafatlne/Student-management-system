<?php 
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php'); 

 ?>

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
     
        //insert query
        $query = "INSERT INTO teacherxcourses SET c_id=:c_id, initial=:initial";
 		
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $c_id=htmlspecialchars(strip_tags($_POST['c_id']));
        $initial=htmlspecialchars(strip_tags($_POST['initial']));
       
       // bind the parameters
        $stmt->bindParam(':c_id', $c_id);
        $stmt->bindParam(':initial', $initial);
        
         
 
         
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

    try{
    	$query2 = "SELECT distinct initial from teacher";
    	$stmt = $con->prepare($query2);
    	$stmt->execute();
    	$teacher=$stmt->fetchAll();
    }catch(Exception $ex){
    	echo ($ex -> getMessage());
    }

        try{
    	$query3 = "SELECT distinct c_id from course";
    	$stmt = $con->prepare($query3);
    	$stmt->execute();
    	$c_id=$stmt->fetchAll();
    }catch(Exception $exe){
    	echo ($exe -> getMessage());
    }
?>
 
<!-- html form here where the product information will be entered -->
<div class="panel-body">
    <div class="panel-body">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>
        <label >Course Code: </td>
    	<td>
    	<select name="initial">
    		<option>---Select initial---</option>
    		<?php foreach ($teacher as $initial) {
    			
    		 ?>
    		<option> <?php echo $initial["initial"]; ?></option>
    		<?php } ?>
    	</select>
    </label>
            </td>
        </tr>
    <div class="form-group">
        <tr>
            <td>
        <label  >Course Code: </td>
    	<td>
    	<select name='c_id'>
    		<option>---Select Course Code---</option>
    		<?php foreach ($c_id as $row) {
    			
    		 ?>
    		<option> <?php echo $row["c_id"]; ?></option>
    		<?php } ?>
    	</select>
    </label>
            </td>
        </tr>
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