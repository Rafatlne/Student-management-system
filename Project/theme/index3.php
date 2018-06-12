<?php
?>

<!-- Start from Here -->  
<!-- PHP code to read records will be here -->
<?php
// include database connection
include 'config/database.php';


// PAGINATION VARIABLES
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set records or rows of data per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// delete message prompt will be here
$action = isset($_GET['action']) ? $_GET['action'] : "";

// if it was redirected from delete.php
if($action=='deleted'){
    //echo "<div class='alert alert-success'>Record was deleted.</div>";
}

// select all data
// select data for current page
$query = "SELECT * FROM admin
LIMIT :from_record_num, :records_per_page";

$stmt = $con->prepare($query);
$stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
$stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// this is how to get number of rows returned
$num = $stmt->rowCount();

// link to create record form
// echo "<form action='search.php' method='POST'>
//     <input type='text' name = 'search' placeholder='search'>
//     <button type='submit' name = 'submit-search'>Search</button>
// </form> "; 


// echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";

//check if more than 0 record found
if($num>0){
   
    // data from database will be here
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
    
    //creating our table heading
    echo "<tr>";
    echo "<th>Username</th>";
    echo "<th>Password</th>";
    echo "<th>Action</th>";
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
        echo "<td>{$Admin_ID}</td>";
        echo "<td>{$Password}</td>";
        echo "<td>";
            // read one record 
        echo "<a href='read_one.php?Admin_ID={$Admin_ID}' class='btn btn-info '>Read</a>";
        
            // we will use this links on next part of this post
        echo "<a href='update.php?Admin_ID={$Admin_ID}' class='btn btn-primary'>Edit</a>";
        
            // we will use this links on next part of this post
        echo "<a href='delete.php?Admin_ID={$Admin_ID}' class='btn btn-danger'>Delete</a>&nbsp";
        echo "</td>";
        echo "</tr>";
    }
    
// end table
    echo "</table>";
    
}
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
// PAGINATION
// count total number of rows
$query = "SELECT COUNT(*) as total_rows FROM admin";
$stmt = $con->prepare($query);

// execute query
$stmt->execute();

// get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['total_rows'];
// paginate records
$page_url="index.php?";
include_once "paging.php";

// if no records found

?>
<!-- Start from Here -->       
