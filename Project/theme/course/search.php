<?php
//include 'header.php';
 $filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/dbh.php'); 

?>

<h1>Search Page</h1>

<div class="article-container">
	<?php
		if (isset($_POST['submit-search'])) {
			$search = mysqli_real_escape_string($con,$_POST['search']);
			$sql = "SELECT * from course  where cName Like '%$search%' or c_id like '%$search%'";
			$result = mysqli_query($con,$sql);
			$queryResult = mysqli_num_rows($result);
			echo "There are ".$queryResult." results!";
			if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				
				echo "<a href='article.php?c_id=".$row['c_id']."'><div class='article-box'>
				<h3>".$row['c_id']."</h3>
				<p>".$row['cName']."<p>
				<br> <br>
				<div></a>";
				
				}
			} else{
			 	echo "There are no results matchin your search";
			}
		}
	?>
</div>