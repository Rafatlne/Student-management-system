<?php
?>

<!DOCTYPE HTML>
<html>
<head>
    <title></title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Product</h1>
        </div>
         
        <!-- PHP read one record will be here -->
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$s_id=isset($_GET['s_id']) ? $_GET['s_id'] : die('ERROR: Record s_id not found.');
 
//include database connection
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php'); 
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT * FROM student WHERE s_id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $s_id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form

        $sName=$row['sName'];
        $s_id=$row['s_id'];
        $contact=$row['contact'];
        $gender=$row['gender'];
        $batch=$row['batch'];
 
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
        <!-- HTML read one record table will be here -->
        <!--we have our html table here where the record will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Name</td>
        <td><?php echo htmlspecialchars($sName, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>ID</td>
        <td><?php echo htmlspecialchars($s_id, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td><?php echo htmlspecialchars($gender, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
    <tr>
        <td>Contact</td>
        <td><?php echo htmlspecialchars($contact, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
    <tr>
        <td>Batch</td>
        <td><?php echo htmlspecialchars($batch, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>
            <a href='tFooter.php' class='btn btn-danger'>Back to read products</a>
        </td>
    </tr>
</table>
 
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>