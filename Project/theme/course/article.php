<?php
//include 'header.php';
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/dbh.php'); 

include_once('tHeader.php');

?>


<h1>Article Page</h1>

<div class="articles-container">
	<?php
		$c_id = mysqli_real_escape_string($con,$_GET['c_id']);
		//$date = mysqli_real_escape_string($con,$_GET['date']);
		$sql = "SELECT * from course where  c_id='$c_id'";
		$result = mysqli_query($con,$sql);
		$queryResults = mysqli_num_rows($result);

		if($queryResults > 0){
			while ($row = mysqli_fetch_assoc($result)) {

    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
    
    //creating  table 
    echo "<tr>";
    echo "<th>Course Name</th>";
    echo "<th>Course Code</th>";
    echo "</tr>";
    
        echo "<tr>";
        echo "<td>".$row['cName']."</td>";
        echo "<td>".$row['c_id']."</td>";   
        echo "<td>";
            // read one record 
        echo "<a href='read_one.php?c_id={$c_id}' class='btn btn-info '>Read</a>";
        
            // we will use this links on next part of this post
        echo "<a href='update.php?c_id={$c_id}' class='btn btn-primary'>Edit</a>";
        
        echo "<a href='delete.php?c_id={$c_id}' class='btn btn-danger'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    
// end table
    echo "</table>";
    
}
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
	?>
</div>

<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    } 
}
</script>
</body>
</html>