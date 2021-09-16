<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct(){
		parent::__construct();
		
		$this->load->model('Main_model');
		$this->load->library('upload');
		$this->load->helper('url', 'form', 'file');
		
	}
	
	public function checkLogin() {
		if(!isset($_SESSION['adminId'])) {
			redirect(base_url()."index.php/Admin/login");
		}
	}
	
	public function forget_password_API() {
		$email = $_POST['email'];
		$user_data = $this->Main_model->get_table('user',array('email'=>$email, 'isdeleted'=>0, 'role'=>'admin'));
		
		if(!empty($user_data)) {
			$this->load->library('email');
			$config['useragent'] = 'PHPMailer';
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			// $config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = 465;
			$config['smtp_user'] = 'suryainfotechpc5@gmail.com';
			$config['smtp_pass'] = 'suryainfotech@123';
			$config['charset']  = 'utf-8';
			$config['mailtype'] = 'text';
			$config['wordWrap'] = true;
			$config['validation'] = FALSE;
			$config['smtp_timeout'] = '30';
			$this->email->initialize($config);
			
			$this->email->set_newline("\r\n");
			$this->email->from('suryainfotechpc5@gmail.com', 'eComply');
			$this->email->to($email);
			$this->email->subject('eComply Training and Certification');
			$txt = "Your Password is : ".$user_data[0]['password'];
			$this->email->message($txt);
			$res = $this->email->send();
			// print_r($res);
			if($res) {			
				echo "mail_send";
			}else {
				// show_error($this->email->print_debugger());
				echo "error";
			}
		}else{
			echo "mail_not_found";
		}
	
	}
	
	public function logout() {
		session_destroy();
		redirect(base_url()."index.php/Admin/login");
	}
	
	public function login() {
		$this->load->view('Admin/login');
	}
	
	public function do_login() {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$res = $this->Main_model->get_table('user',array('email'=>$email, 'password'=>$password, 'role'=>'admin'));
		if(!empty($res)) {
			echo "success";
			$_SESSION['adminId'] = $res[0]['user_id'];
		}else {
			echo "unsuccess";
		}
	}
	
	public function index() {
		$this->checkLogin();
		$this->load->view('Admin/header');
		$this->load->view('Admin/dashboard');
		$this->load->view('Admin/footer');
	}
	
	public function addcourse() {
		$this->checkLogin();
		
		$success = 0;
		$course = "";
		if(isset($_GET['id'])) {
			$course = $this->Main_model->get_table('courses',array('courseid'=>$_GET['id'], 'isdeleted'=> 0));
			if(isset($_POST['add_course'])) {
				$update_data['coursename'] = $_POST['course_name'];
				$update_data['coursedescription'] = $_POST['course_desc'];
				$update_data['price'] = $_POST['course_price'];
				$this->Main_model->update_data('courses',$update_data,array('courseid'=>$_GET['id']));
				$success = 1;
			}
		}else if(isset($_POST['add_course'])) {
			$insert_data['coursename'] = $_POST['course_name'];
			$insert_data['coursedescription'] = $_POST['course_desc'];
			$insert_data['price'] = $_POST['course_price'];
			$insert_data['createdat'] = date('Y-m-d h:i:s');
			$this->Main_model->insert_data('courses',$insert_data);
		}
		$this->load->view('Admin/header');
		$this->load->view('Admin/addcourse',array('course'=>$course, 'success'=>$success));
		$this->load->view('Admin/footer');
	}
	
	public function viewcourse() {
		$this->checkLogin();
		
		$courses = $this->Main_model->get_table('courses',array('isdeleted'=> 0));
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewcourse',array('courses'=>$courses));
		$this->load->view('Admin/footer');
	}
	
	public function deleterecord() {
		$tbl_name = $_POST['tbl_name'];
		$id = $_POST['id'];
		$field = $_POST['wh_field'];
		$res = $this->Main_model->update_data($tbl_name, array('isdeleted'=>1),array($field=>$id));
		echo $res;
	}
	
	public function removerecordAPI() {
		$tbl_name = $_POST['tbl_name'];
		$id = $_POST['id'];
		$field = $_POST['wh_field'];
		$res = $this->Main_model->delete_record($tbl_name, array($field=>$id));
		print_r($res);
	}
	
	public function restorerecordAPI() {
		$tbl_name = $_POST['tbl_name'];
		$id = $_POST['id'];
		$field = $_POST['wh_field'];
		$res = $this->Main_model->update_data($tbl_name, array('isdeleted'=>0),array($field=>$id));
		echo $res;
	}
	
	public function addmodule() {
		$this->checkLogin();
		$module = "";
		if(isset($_GET['id'])) {
			$module = $this->Main_model->get_table('modules', array('id'=>$_GET['id'], 'isdeleted'=>0));
			if(isset($_POST['add_module'])) {
				$update_data['modulename'] = $_POST['module_name'];
				$update_data['course_id'] = $_POST['course_id'];
				if(!empty($_FILES['media_video']['name']) || $_FILES['media_video']['name']!="" )
				{
					$config['upload_path'] = './uploads/module/videos/';
					$file_ext = pathinfo($_FILES["media_video"]["name"] ,PATHINFO_EXTENSION);
					$new_filename = date('Y_m_d_h_i_s').".".$file_ext;
					$config['file_name'] = $new_filename;
					$config['allowed_types'] = 'mov|avi|flv|wmv|mp3|mp4';
					// $config['allowed_types'] = 'gif|jpg|png';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('media_video'))
					{
						$error = array('error' => $this->upload->display_errors());
					}else {
						$update_data['videofilepath'] = $new_filename;
					}
				}
				$this->Main_model->update_data('modules',$update_data,array('id'=>$_GET['id']));
				$this->session->set_flashdata('res', 'update_success');
			}
		}else if(isset($_POST['add_module'])) {
			$insert_data['modulename'] = $_POST['module_name'];
			$insert_data['course_id'] = $_POST['course_id'];
			$insert_data['createdat'] = date('Y-m-d h:i:s');
			if(!empty($_FILES['media_video']['name']) || $_FILES['media_video']['name']!="" ) {
				$config['upload_path'] = './uploads/module/videos/';
				$file_ext = pathinfo($_FILES["media_video"]["name"] ,PATHINFO_EXTENSION);
				$new_filename = date('Y_m_d_h_i_s').".".$file_ext;
				$config['file_name'] = $new_filename;
				$config['allowed_types'] = 'mov|avi|flv|wmv|mp3|mp4';
				// $config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('media_video')) {
					$error = array('error' => $this->upload->display_errors());
                }else {
					$insert_data['videofilepath'] = $new_filename;
				}
			}
			$id = $this->Main_model->insert_data('modules',$insert_data);	
			if($id) {
				$this->session->set_flashdata('res', 'success');
			} else {
				$this->session->set_flashdata('res', 'error');
			}
		}
		$courses = $this->Main_model->get_table('courses',array('isdeleted'=> 0));
		$this->load->view('Admin/header');
		$this->load->view('Admin/addmodule',array('courses'=>$courses, 'module'=>$module));
		$this->load->view('Admin/footer');
	}
	
	public function viewmodule() {
		$this->checkLogin();
		
		$modules = $this->Main_model->get_Modules();
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewmodule',array('modules'=>$modules));
		$this->load->view('Admin/footer');
	}
	
	public function getModuleAPI() {
		$courseid = $_POST['course_id'];
		$modules = $this->Main_model->get_table('modules',array('isdeleted'=>0, 'course_id'=>$courseid));
		echo json_encode($modules);
		exit;
	}
	
	public function getSectionAPI() {
		$arr['courseid'] = $_POST['course_id'];
		$arr['moduleid'] = $_POST['module_id'];
		$arr['isdeleted'] = 0;
		$section = $this->Main_model->get_table('section',$arr);
		echo json_encode($section);
		exit;
	}
	
	public function addsection() {
		$this->checkLogin();
		
		$section = "";
		$courses = $this->Main_model->get_table('courses',array('isdeleted'=>0));
		$modules = $this->Main_model->get_table('modules',array('isdeleted'=>0, 'course_id'=>$courses[0]['courseid']));
		if(isset($_GET['id'])) {
			$sectionId = $_GET['id'];
			$section = $this->Main_model->get_table('section', array('id'=>$sectionId));
			$modules = $this->Main_model->get_table('modules', array('course_id'=>$section[0]['courseid'], 'isdeleted'=>0));
			if(isset($_POST['add_section'])) {
				$update_data['sectiontitle'] = $_POST['section_title'];
				$update_data['courseid'] = $_POST['course_id'];
				$update_data['moduleid'] = $_POST['module_id'];
				$id = $this->Main_model->update_data('section', $update_data, array('id'=>$sectionId));
				$this->session->set_flashdata('res', 'update_success');
			}
		}else if(isset($_POST['add_section'])) {
			$insert_data['sectiontitle'] = $_POST['section_title'];
			$insert_data['courseid'] = $_POST['course_id'];
			$insert_data['moduleid'] = $_POST['module_id'];
			$insert_data['createdat'] = date('Y-m-d h:i:s');
			$id = $this->Main_model->insert_data('section',$insert_data);
			if($id) {
				$this->session->set_flashdata('res', 'success');
			}else {
				$this->session->set_flashdata('res', 'error');
			}
		}
		
		$this->load->view('Admin/header');
		$this->load->view('Admin/addsection', array('section'=>$section, 'courses'=>$courses, 'modules'=>$modules));
		$this->load->view('Admin/footer');
	}
	
	public function viewsection() {
		$this->checkLogin();
		
		$sections = $this->Main_model->get_Sections();
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewsection',array('sections'=>$sections));
		$this->load->view('Admin/footer');
	}
	
	public function user() {
		$this->checkLogin();
		
		$users = $this->Main_model->get_table('user',array('isdeleted'=>0, 'role'=>'user'));
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewuser',array('users'=>$users));
		$this->load->view('Admin/footer');
	}
	
	public function purchaseproject() {
		$this->checkLogin();
		
		$projects = "";
		if(isset($_GET['uid'])) {
			$projects = $this->Main_model->get_purchaseproject($_GET['uid']);
		}
		$this->load->view('Admin/header');
		$this->load->view('Admin/purchaseproject',array('projects'=>$projects));
		$this->load->view('Admin/footer');
	}
	
	public function coursedetails() {
		$this->checkLogin();	
		
		$modules = "";
		if(isset($_GET['cid'])) {
			$modules = $this->Main_model->get_table('modules',array('course_id'=>$_GET['cid'], 'isdeleted'=>0));
		}
		$this->load->view('Admin/header');
		$this->load->view('Admin/coursedetails',array('modules'=>$modules));
		$this->load->view('Admin/footer');
	}
	
	public function submittedanswer() {
		$this->checkLogin();
		
		$modules = "";
		$answers = "";
		if(isset($_GET['uid']) && isset($_GET['cid']) && isset($_GET['mid']) && isset($_GET['sid'])) {
			$answers = $this->Main_model->get_submittedans($_GET['uid'], $_GET['cid'], $_GET['mid'], $_GET['sid']);
			$modules = $this->Main_model->get_table('modules', array('id'=>$_GET['mid']));
		}
		$this->load->view('Admin/header');
		$this->load->view('Admin/submittedanswer',array('answers'=>$answers, 'modules'=>$modules));
		$this->load->view('Admin/footer');
	}
	
	public function removeduser() {
		$this->checkLogin();
		
		$users = $this->Main_model->get_table('user',array('isdeleted'=>1));
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewremoveduser',array('users'=>$users));
		$this->load->view('Admin/footer');
	}
	
	public function addquestion() {
		$this->checkLogin();
		$modules = "";
		$sections = "";
		$question = "";
		$courses = $this->Main_model->get_table('courses',array('isdeleted'=>0));
		if(isset($_GET['id'])) {
			$questionID = $_GET['id'];
			$question = $this->Main_model->get_table('question',array('questionid'=>$questionID));
			$modules = $this->Main_model->get_table('modules', array('course_id'=>$question[0]['course_id'], 'isdeleted'=>0));
			$sections = $this->Main_model->get_table('section', array('moduleid'=>$question[0]['module_id'], 'isdeleted'=>0));
			$module = $this->Main_model->get_table('modules',array('isdeleted'=>0));
			if(isset($_POST['add_question'])) {
				$update_data['course_id'] = $_POST['course_id'];
				$update_data['module_id'] = $_POST['module_id'];
				$update_data['question'] = $_POST['question_title'];
				$update_data['typeofquestion'] = $_POST['typeofque'];
				$update_data['option_a'] = $_POST['option_a'];
				$update_data['option_b'] = $_POST['option_b'];
				$update_data['option_c'] = $_POST['option_c'];
				$update_data['option_d'] = $_POST['option_d'];
				$update_data['correct_ans'] = $_POST['correct_ans'];
				$update_data['sectionid'] = $_POST['section_id'];
				$update_data['CreatedTS'] = date('Y-m-d h:i:s');
				$id = $this->Main_model->update_data('question', $update_data, array('questionid'=>$questionID));
				$this->session->set_flashdata('res', 'update_success');
			}
		}else if(isset($_POST['add_question'])) {
			$insert_data['course_id'] = $_POST['course_id'];
			$insert_data['module_id'] = $_POST['module_id'];
			$insert_data['question'] = $_POST['question_title'];
			$insert_data['typeofquestion'] = $_POST['typeofque'];
			$insert_data['option_a'] = $_POST['option_a'];
			$insert_data['option_b'] = $_POST['option_b'];
			$insert_data['option_c'] = $_POST['option_c'];
			$insert_data['option_d'] = $_POST['option_d'];
			$insert_data['correct_ans'] = $_POST['correct_ans'];
			$insert_data['sectionid'] = $_POST['section_id'];
			$insert_data['CreatedTS'] = date('Y-m-d h:i:s');
			$id = $this->Main_model->insert_data('question',$insert_data);
			if($id) {
				$this->session->set_flashdata('res', 'success');
			}else {
				$this->session->set_flashdata('res', 'error');
			}
		}
		
		$this->load->view('Admin/header');
		$this->load->view('Admin/addquestion',array('courses'=>$courses, 'modules'=>$modules, 'sections'=>$sections, 'question'=>$question));
		$this->load->view('Admin/footer');
	}
	
	public function viewquestion() {
		$this->checkLogin();
		
		$questions = $this->Main_model->get_questions('question',array('isdeleted'=>1));
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewquestion',array('questions'=>$questions));
		$this->load->view('Admin/footer');
	}
	
	public function payment() {
		$this->checkLogin();
		
		$payment_data = $this->Main_model->get_payment();
		$this->load->view('Admin/header');
		$this->load->view('Admin/viewpayment', array('payment_data'=>$payment_data));
		$this->load->view('Admin/footer');
	}
	
	public function setting() {
		$this->checkLogin();
		
		if(isset($_POST['add_percentage'])) {
			$this->Main_model->update_data('settings', array('setting_value'=>$_POST['percentage'], 'updatedat'=> date('Y-m-d h:i:s')), array('setting_key'=>'passing_percentage'));
		}
		
		$percentage = $this->Main_model->get_table("settings",array('setting_key'=>'passing_percentage'));
		$this->load->view('Admin/header');
		$this->load->view('Admin/setting', array('percentage'=>$percentage));
		$this->load->view('Admin/footer');
	}
	
	public function userexamresult() {
		$this->checkLogin();
		
		$exam_users = $this->Main_model->get_examuser();
		$passing_per = $this->Main_model->get_table("settings",array('setting_key'=>'passing_percentage'));
		// print_r($exam_users);
		$this->load->view('Admin/header');
		$this->load->view('Admin/examuserresult', array('exam_users'=>$exam_users));
		$this->load->view('Admin/footer');
		
	}
	
}








