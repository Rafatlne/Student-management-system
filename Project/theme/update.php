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
$Admin_ID=isset($_GET['Admin_ID']) ? $_GET['Admin_ID'] : die('ERROR: Record ID not found.');

//include database connection
include_once('config/database.php'); 

 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM admin WHERE Admin_ID = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $Admin_ID);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $Password = $row['Password'];
    $Admin_ID = $row['Admin_ID'];
    
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
        $query = "UPDATE admin 
                    SET Password=:Password, Admin_ID=:Admin_ID 
                    WHERE Admin_ID = :Admin_ID";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $Password=htmlspecialchars(strip_tags($_POST['Password']));
        $Admin_ID=htmlspecialchars(strip_tags($_POST['Admin_ID']));

 
        // bind the parameters
        $stmt->bindParam(':Password', $Password);
        $stmt->bindParam(':Admin_ID', $Admin_ID);
        
        
         
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?Admin_ID={$Admin_ID}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Admin_ID</td>
            <td><input type="text" name='Admin_ID' readonly="readonly" value="<?php echo htmlspecialchars($Admin_ID, ENT_QUOTES);  ?>" class='form-control'></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='text' name='Password' value="<?php echo htmlspecialchars($Password, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read products</a>
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