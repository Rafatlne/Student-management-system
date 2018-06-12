<?php
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Update a Record - PHP CRUD Tutorial</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Update Product</h1>
        </div>
     
        <!-- PHP read record by ID will be here -->
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$c_id=isset($_GET['c_id']) ? $_GET['c_id'] : die('ERROR: Record ID not found.');

//include database connection
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php'); 

 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM course WHERE c_id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $c_id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $cName = $row['cName'];
    $c_id = $row['c_id'];
    
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
        <!-- HTML form to update record will be here -->
        <!-- PHP post to update record will be here -->
        <?php
 
// check if form was submitted
if($_POST){
     
    try{
     
        // write update query
        // in this case, it seemed like we have so many fields to pass and 
        // it is better to label them and not use question marks
        $query = "UPDATE course 
                    SET cName=:cName, c_id=:c_id
                    WHERE c_id = :c_id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $cName=htmlspecialchars(strip_tags($_POST['cName']));
        $c_id=htmlspecialchars(strip_tags($_POST['c_id']));
        
 
        // bind the parameters
        $stmt->bindParam(':cName', $cName);
        $stmt->bindParam(':c_id', $c_id);
        
        
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }
         
    }
     
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?c_id={$c_id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Course Name</td>
            <td><input type='text' name='cName' value="<?php echo htmlspecialchars($cName, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Course Code</td>
            <td><input type="text" name='c_id' readonly="readonly" value="<?php echo htmlspecialchars($c_id, ENT_QUOTES);  ?>" class='form-control'></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='tFooter.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>