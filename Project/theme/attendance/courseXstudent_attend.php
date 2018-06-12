<?php 
include 'inc/header.php';
include 'lib/student.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("form").submit(function(){
            var roll = true;
            $(':radio').each(function(){
                name = $(this).attr('name');
                if (roll && !$(':radio[name="'+ name +'"]:checked').length) {
                    $('.alert').show();
                    roll = false;
                }

            })
            return roll;
        })
    })
</script>
<?php 
//error_reporting(0);
$stu = new Student();
$dt = $_GET['dt'];
$cur_date = date('Y-m-d');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $attendance = $_POST['attendance'];
    $att_update = $stu->courseWiseAttend($cur_date,$attendance,$dt);
}
?>

<?php 

if(isset($att_update)){
    echo $att_update;
}


?>
<div class='alert alert-danger' style="display:none"><strong>Error!</strong> Student Roll Missing</div>
<div class="panel panel-default">
    <div class="panel-heading">
       <h2>
          <a class="btn btn-success" href="add.php" title="">Add student</a>
          <a class="btn btn-info pull-right" href="course_view.php" title="">Back</a>
      </h2>
  </div>
  <div class="panel-body">
        <div class="well text-center" style="font-size: 20px">
      <strong>   Subject Code:</strong> 
      <?php 
        echo $dt;
       ?> 
       <br>
       <strong>Date:</strong> 
       <?php 
       echo $cur_date ; 
       ?>

   </div>
   
   <form action="" method="post" >
        
       <table class="table table-striped ">
          <tr>
             <th width="25%">Student Name</th>
             <th width="25%">Student Roll</th>
             <th width="25%">Attendance</th>
            
         </tr>
         <?php 
         
         $get_student = $stu->getAllData($dt);

         if ($get_student) {
             $i=0;
             while ($value = $get_student->fetch_assoc()) {
               $i++;
               ?>             
               <tr>
                 <td><?php echo $value['sName']; ?></td>
                 <td><?php echo $value['s_id']; ?></td>  
                 <td>
                    <input type="radio" name="attendance[<?php echo $value['s_id']; ?>]" value="present">Present
                    <input type="radio" name="attendance[<?php echo $value['s_id'];  ?>]" value="Absent">Absent
                </td>
            </tr>
            <?php      }  } ?>
            <tr>
                <td colspan="4">
                    <div class="form-group">
                       <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                   </div>
               </td>
           </tr>

       </table>
   </form>
   
</div>

</div>

</div>
</div>


</body>
</html>