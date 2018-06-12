<?php
// include database connection
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/database.php'); 
 
try {
     
    // get record ID
    // isset() is a PHP function used to verify if a value is there or not
    $c_id=isset($_GET['c_id']) ? $_GET['c_id'] : die('ERROR: Record c_id not found ');
 
    // delete query
    $query = "DELETE FROM course WHERE c_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $c_id);
     
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