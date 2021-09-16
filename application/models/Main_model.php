<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_model extends CI_Model
 {
	public function get_table($table,$where=null)
	{
		$this->db->select('*');
		$this->db->from($table);
		if($where!=null) {
			foreach($where as $key => $value) {
				$this->db->where($key,$value);
			}
		}
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	public function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
		$insert_id=$this->db->insert_id();
		return $insert_id;
	}
	public function update_data($table,$data,$where)
	{
		foreach($where as $key=>$value){
			$this->db->where($key,$value);
		}		
		$data = $this->db->update($table, $data); 
		$this->db->last_query();
		return $data;
		exit;
	}
	public function GetDataByField($tablename,$fieldname,$fieldvalue){
		$sql = "select * from ".$tablename." where ".$fieldname." = '".$fieldvalue."'";
		//echo $sql;
		$da=$this->db->query($sql);
		return $da->result_array();
		
	}
	
	public function get_dashboard_data($user_id) {
		$sql = "select `courspayment`.*, `courses`.* from courspayment join courses on courspayment.course_id = courses.courseid where courspayment.user_id ='".$user_id."'";
		$da=$this->db->query($sql);
		return $da->result_array();
	}
	
	public function get_Modules() {
		$sql = "select modules.*, courses.coursename from modules join courses on modules.course_id = courses.courseid where modules.isdeleted = 0";
		$da = $this->db->query($sql);
		return $da->result_array();
	}
	
	public function get_Sections() {
		$sql = "select section.*, courses.coursename, modules.modulename from section join courses on section.courseid = courses.courseid join modules on section.moduleid = modules.id where section.isdeleted = 0";
		$da = $this->db->query($sql);
		return $da->result_array();
	}
	
	public function get_questions() {
		$sql = "select question.*, section.sectiontitle, courses.coursename, modules.modulename from question join section on question.sectionid=section.id join courses on section.courseid=courses.courseid join modules on section.moduleid=modules.id where question.isdeleted = 0";
		$da = $this->db->query($sql);
		return $da->result_array();
	}
	
	public function get_purchaseproject($userid) {
		$sql = "select courspayment.*, courses.coursename from courspayment join courses on courspayment.course_id=courseid where courspayment.user_id='".$userid."' and courspayment.isdeleted=0";
		$data = $this->db->query($sql);
		return $data->result_array();
	}
	
	public function delete_record($tbl_name, $where=null) {
		foreach($where as $key=>$val) {
			$this->db->where($key, $val);
		}
		$res = $this->db->delete($tbl_name);
		return $res;
	}
	
	public function get_submittedans($uid, $cid, $mid, $sid) {
		$sql = "select examanswers.*, question.question, question.typeofquestion, question.option_a, question.option_b, question.option_c, question.option_d from examanswers join question on examanswers.questionid=question.questionid where examanswers.userid=".$uid." and examanswers.course_id=".$cid." and examanswers.moduleid=".$mid." and examanswers.sectionid=".$sid;
		$data = $this->db->query($sql);
		return $data->result_array();
	}
	
	public function get_payment() {
		$sql = "select courspayment.*, user.name, user.phoneno, courses.coursename from courspayment join user on courspayment.user_id=user.user_id join courses on courspayment.course_id=courses.courseid where courspayment.isdeleted=0";
		$data = $this->db->query($sql);
		return $data->result_array();
	}
	
	public function get_rightScore($uid, $cid) {
		$sql = "select examanswers.*, question.* from examanswers join question on examanswers.questionid=question.questionid and examanswers.submitted_answer=question.correct_ans where examanswers.userid='".$uid."' and examanswers.course_id='".$cid."'";
		$data = $this->db->query($sql);
		return $data->num_rows();
	}
	
	public function get_totalScore($table,$where=null) {
		$this->db->select('*');
		$this->db->from($table);
		if($where!=null) {
			foreach($where as $key => $value) {
				$this->db->where($key,$value);
			}
		}
		$query = $this->db->get();
		$res = $query->num_rows();
		return $res;
	}
	
	public function get_examuser() {
		$sql = "SELECT userid, course_id FROM examanswers GROUP BY userid, course_id";
		$data = $this->db->query($sql);
		return $data->result_array();
	}
	
	public function get_UserCourse($uid, $cid) {
		$sql = "select user.name, courses.coursename from user join courses on user.user_id='".$uid."' and courses.courseid='".$cid."'";
		$data = $this->db->query($sql);
		return $data->result_array();
	}
	// public function get_module_data($courseId) {
		// $sql = "select `modules`.*, `section`.* from modules join section on section.moduleid = modules.id where modules.course_id= '".$courseId."' and section.courseid = '".$courseId."' ";
		// $da=$this->db->query($sql);
		// return $da->result_array();
	// }
	
}
?>