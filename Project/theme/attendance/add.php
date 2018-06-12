<?php 
	include 'inc/header.php';
    include 'lib/Student.php';
 ?>
 <?php 
   $stu = new Student();
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $Date = $_POST['Date'];
   $s_id = $_POST['s_id'];
   $c_id = $_POST['c_id'];
   $attend = $_POST['attend'];
   $insertdata = $stu->insertStudent($Date,$s_id,$c_id,$attend);
}
  ?>
 <?php 
    if(isset($insertdata)){
        echo $insertdata;
    }

  ?>
     		<div class="panel panel-default">
     			<div class="panel-heading">
     				<h2>
     					<a class="btn  btn-success" href="course_view.php" title="">Back</a>
     				</h2>
     			</div>
     		<div class="panel-body">
     			
     			<form action="" method="post" >
     			    <div class="col-md-4 col-md-offset-4">
                     <div class="form-group">
                         <label for="Date">Date</label >
                         <input type="Date" class="form-control" style="width: 300px;" name="Date" id="Date" >
                      </div>
                      
                      <div class="form-group">
                         <label for="s_id">Student Id</label>
                         <input type="text" class="form-control" style="width: 300px;" name="s_id" id="s_id" >
                      </div>

                      <div class="form-group">
                         <label for="c_id">Course Id</label >
                         <input type="text" class="form-control" style="width: 300px;" name="c_id" id="c_id" >
                      </div>
                      <div class="form-group">
                         <label for="c_id">Ateendance</label >
                         <input type="text" class="form-control" style="width: 300px;" name="attend" id="attend" >
                      </div>
                     <div class="form-group">
                         <input type="submit" class="btn btn-primary" name="submit" value="Add Student">
                      </div>
                    </div>
     				
     			</form>
     			
     		</div>
     			
     		</div>
     			
     		</div>
     	</div>
         
         
     </body>
 </html>