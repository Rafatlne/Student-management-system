<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/database.php') 
 ?>
<?php 


 class Student
 {
 	private $db;
 	public function __construct()
 	{
 		$this->db = new Database();
 	}

 	public function getStudents(){

 		$query = "SELECT  student.s_id,sName FROM student,attendence where attendence.s_id = student.s_id";
 		$result = $this->db->select($query);
 		return $result;

 	}

 	public function insertStudent($Date,$s_id,$c_id,$attend)
 	{
 		$Date = mysqli_real_escape_string($this->db->link,$Date);
 		$s_id = mysqli_real_escape_string($this->db->link,$s_id);
 		$c_id = mysqli_real_escape_string($this->db->link,$c_id);
 		$attend = mysqli_real_escape_string($this->db->link,$attend);
 	if(empty($Date) || empty($s_id) || empty($c_id) || empty($attend)){
 		$msg = "<div class='alert alert-danger'><strong>Error!</strong> Field must not be empty!</div>";
 		return $msg;
 	}else{
 		$stu_query = "INSERT into attendence(aDate,s_id,c_id,attendance) values('$Date','$s_id','$c_id','$attend')";
 		$stu_insert = $this->db->insert($stu_query);

 		if ($stu_insert) {
 			$msg = "<div class='alert alert-success'><strong>Success!</strong> Student data inserted succefully.</div>";
 		return $msg;
 		}else{
 			$msg = "<div class='alert alert-danger'><strong>Error!</strong> Student data not inserted!</div>";
 		return $msg;
 		}

 	}

 	}



 	public function courseWiseAttend($cur_date,$attend = array(),$dt)
 	{
 		$query = "SELECT  distinct aDate,c_id from attendence";
 		$getdata = $this->db->select($query);

 		while ($result = $getdata->fetch_assoc()) {
 			$db_date = $result['aDate'];
 			$db_code = $result['c_id'];
 			if($cur_date == $db_date && $dt == $db_code){
 				$msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance already taken</div>";
 		return $msg;
 			}
 		}

 		foreach ($attend as $atn_key => $atn_value) {
 			if ($atn_value   == "present") {
 				$stn_query = "INSERT into attendence(aDate,attendance,s_id,c_id) values('$cur_date','present','$atn_key','$dt')";
 				$data_insert = $this->db->insert($stn_query);
 			}elseif ($atn_value = "absent") {
				$stn_query = "INSERT into attendence(aDate,attendance,s_id,c_id) values('$cur_date','absent','$atn_key','$dt')";
 				$data_insert = $this->db->insert($stn_query);
 			}
 		}

 	if ($data_insert) {
 			$msg = "<div class='alert alert-success'><strong>Success!</strong> Attendance data inserted succefully.</div>";
 		return $msg;
 		}else{
 			$msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance data not inserted!</div>";
 		return $msg;
 		}

 	}

 	public function getDateList()
 	{
 		$query = "SELECT distinct att_time from tbl_attendance";
 		$result = $this->db->select($query);
 		return $result;
 	}

 	public function getCourseList()
	{
 		$query = "SELECT distinct course.c_id,cName from attendence,course where course.c_id = attendence.c_id";
 		$result = $this->db->select($query);
 		return $result;		
	}


 	public function getAllData($dt)
 	{
 		$query = "SELECT  distinct student.s_id,sName FROM student,attendence where attendence.s_id = student.s_id and c_id = '$dt'";
 		$result = $this->db->select($query);
 		return $result;
 	}


 	public function updateAttendance ($dt,$attend)
 	{
 		foreach ($attend as $atn_key => $atn_value) {
 			if ($atn_value   == "present") {
 				$query = " UPDATE tbl_attendance
 						   set attend= 'present'
 						   where  roll = '".$atn_key."' and att_time = '".$dt."'"; 
 						   $data_update = $this->db->insert($query);
 
 			}elseif ($atn_value = "absent") {
				$query = " UPDATE tbl_attendance
 						   set attend= 'absent'
 						   where  roll = '".$atn_key."' and att_time = '".$dt."'"; 
 						   $data_update = $this->db->insert($query);			
 			}
 		}

 	if ($data_update) {
 			$msg = "<div class='alert alert-success'><strong>Success!</strong> Attendance data updated succefully.</div>";
 		return $msg;
 		}else{
 			$msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance data not updated!</div>";
 		return $msg;
 		}
 	}
 	
 } ?>