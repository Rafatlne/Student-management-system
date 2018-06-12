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
			$sql = "SELECT * from student  where sName Like '%$search%' or s_id like '%$search%'";
			$result = mysqli_query($con,$sql);
			$queryResult = mysqli_num_rows($result);
			echo "There are ".$queryResult." results!";
			if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				
				echo "<a href='article.php?s_id=".$row['s_id']."'><div class='article-box'>
				<h3>".$row['s_id']."</h3>
				<p>".$row['sName']."<p>
				<p>".$row['gender']."<p>
				<p>".$row['contact']."<p>
				<p>".$row['batch']."<p>
				<br> <br>
				<div></a>";
				
				}
			} else{
			 	echo "There are no results matchin your search";
			}
		}
	?>
</div>