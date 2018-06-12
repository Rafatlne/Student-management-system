<?php 
include 'inc/header.php';
include 'lib/student.php';
?>


<div class="panel panel-default">
    <div class="panel-heading">
       <h2>
          <a class="btn btn-primary pull-right" href="add.php" title="">Add student</a>
          <a class="btn btn-success " href="../teacher/tFooter.php" title="">Back</a>
      </h2>
  </div>
  <div class="panel-body">
   <form action="" method="post" >
       <table class="table table-striped" align="center">
          <tr>
            <th width="25%">Course Name</th>
             <th width="25%">Course Code</th>
             <th width="20%">Action</th>
            
         </tr>
         <?php 
         $stu = new Student();
         $get_courseCode = $stu->getCourseList();

         if ($get_courseCode) {
             $i=0;
             while ($value = $get_courseCode->fetch_assoc()) {

               ?>    					
               <tr>
                <td><?php echo $value['cName']; ?></td>
                 <td><?php echo $value['c_id']; ?></td>
                 <td>
                    <a class="btn btn-primary" href="courseXstudent_attend.php?dt=<?php echo $value['c_id']; ?>" >Take Attend</a>
                </td>
            </tr>
            <?php      }  } ?>

       </table>
       
   </form>
   
</div>

</div>

</div>
</div>


</body>
</html>