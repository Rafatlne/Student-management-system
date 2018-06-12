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
			$sql = "SELECT * from teacher  where Tname Like '%$search%' or initial like '%$search%' or Contact Like '%$search%'";
			$result = mysqli_query($con,$sql);
			$queryResult = mysqli_num_rows($result);
			echo "There are ".$queryResult." results!";
			if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				
				echo "<a href='article.php?initial=".$row['initial']."'><div class='article-box'>
				<h3>".$row['initial']."</h3>
				<p>".$row['Tname']."<p>
				<p>".$row['Contact']."<p>
				<div></a>";
				
				}
			} else{
			 	echo "There are no results matchin your search";
			}
		}
	?>
</div>