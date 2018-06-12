<?php
// include database connection
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php'); 
 
try {
     
    // get record ID
    // isset() is a PHP function used to verify if a value is there or not
    $s_id=isset($_GET['s_id']) ? $_GET['s_id'] : die('ERROR: Record s_id not found ');
 
    // delete query
    $query = "DELETE FROM student WHERE s_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $s_id);
     
    if($stmt->execute()){
        // redirect to read records page and 
        // tell the user record was deleted
        header('Location: tFooter.php?action=deleted');
    }else{
        die('Unable to delete record.');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>