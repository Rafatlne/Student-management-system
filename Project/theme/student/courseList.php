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
    $query = "SELECT c_id,s_id FROM studentxcourse WHERE s_id = ?";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $s_id);
 
    // execute our query
    $stmt->execute();
    $num = $stmt->rowCount();
 if($num>0){
   
    // data from database will be here
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
    
    //creating our table heading
    echo "<tr>";
    
    echo "<th>Student ID</th>";
    echo "<th>Course Code</th>";
    echo "</tr>";
    
    // table body will be here
    // retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
        extract($row);
        
    // creating new table row per record
        echo "<tr>";
        echo "<td>{$s_id}</td>";
        echo "<td>{$c_id}</td>";
        echo "</tr>";
    }
    
// end table
    echo "</table>";
    
  }
   else{
    echo "<div class='alert alert-danger'>No records found.</div>";
  }

 }

catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
<table class='table table-hover table-responsive table-bordered'>
    <tr>
            <a href='tFooter.php' class='btn btn-danger'>Back to read teacher</a>
        </td>
    </tr>
</table>
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>