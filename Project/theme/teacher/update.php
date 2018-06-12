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
$initial=isset($_GET['initial']) ? $_GET['initial'] : die('ERROR: Record ID not found.');

//include database connection
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php'); 

 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM teacher WHERE initial = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $initial);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $Tname = $row['Tname'];
    $initial = $row['initial'];
    $Contact = $row['Contact'];
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
        $query = "UPDATE teacher 
                    SET Tname=:Tname, initial=:initial, Contact=:Contact 
                    WHERE initial = :initial";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $Tname=htmlspecialchars(strip_tags($_POST['Tname']));
        $initial=htmlspecialchars(strip_tags($_POST['initial']));
        $Contact=htmlspecialchars(strip_tags($_POST['Contact']));
 
        // bind the parameters
        $stmt->bindParam(':Tname', $Tname);
        $stmt->bindParam(':initial', $initial);
        $stmt->bindParam(':Contact', $Contact);
        
         
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?initial={$initial}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='Tname' value="<?php echo htmlspecialchars($Tname, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Initial</td>
            <td><input type="text" name='initial' readonly="readonly" value="<?php echo htmlspecialchars($initial, ENT_QUOTES);  ?>" class='form-control'></td>
        </tr>
        <tr>
            <td>Contact</td>
            <td><input type='text' name='Contact' value="<?php echo htmlspecialchars($Contact, ENT_QUOTES);  ?>" class='form-control' /></td>
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