<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditor extends CI_Controller {

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
			redirect(base_url()."index.php/Auditor/login");
		}
	}
	
	public function forget_password_API() {
		$email = $_POST['email'];
		$user_data = $this->Main_model->get_table('user',array('email'=>$email, 'isdeleted'=>0, 'role'=>'auditor'));
		
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
		redirect(base_url()."index.php/Auditor/login");
	}
	
	public function login() {
		$this->load->view('Auditor/login');
	}
	
	public function do_login() {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$res = $this->Main_model->get_table('user',array('email'=>$email, 'password'=>$password, 'role'=>'auditor'));
		if(!empty($res)) {
			echo "success";
			$_SESSION['adminId'] = $res[0]['user_id'];
		}else {
			echo "unsuccess";
		}
	}
	
	public function index() {
		$this->checkLogin();
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/dashboard');
		$this->load->view('Auditor/footer');
	}
	

	
	public function viewcourse() {
		$this->checkLogin();
		
		$courses = $this->Main_model->get_table('courses',array('isdeleted'=> 0));
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/viewcourse',array('courses'=>$courses));
		$this->load->view('Auditor/footer');
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
	

	public function viewmodule() {
		$this->checkLogin();
		
		$modules = $this->Main_model->get_Modules();
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/viewmodule',array('modules'=>$modules));
		$this->load->view('Auditor/footer');
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
	

	
	public function viewsection() {
		$this->checkLogin();
		
		$sections = $this->Main_model->get_Sections();
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/viewsection',array('sections'=>$sections));
		$this->load->view('Auditor/footer');
	}
	
	public function user() {
		$this->checkLogin();
		
		$users = $this->Main_model->get_table('user',array('isdeleted'=>0, 'role'=>'user'));
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/viewuser',array('users'=>$users));
		$this->load->view('Auditor/footer');
	}
	
	public function purchaseproject() {
		$this->checkLogin();
		
		$projects = "";
		if(isset($_GET['uid'])) {
			$projects = $this->Main_model->get_purchaseproject($_GET['uid']);
		}
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/purchaseproject',array('projects'=>$projects));
		$this->load->view('Auditor/footer');
	}
	
	public function coursedetails() {
		$this->checkLogin();	
		
		$modules = "";
		if(isset($_GET['cid'])) {
			$modules = $this->Main_model->get_table('modules',array('course_id'=>$_GET['cid'], 'isdeleted'=>0));
		}
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/coursedetails',array('modules'=>$modules));
		$this->load->view('Auditor/footer');
	}
	
	public function submittedanswer() {
		$this->checkLogin();
		
		$modules = "";
		$answers = "";
		if(isset($_GET['uid']) && isset($_GET['cid']) && isset($_GET['mid']) && isset($_GET['sid'])) {
			$answers = $this->Main_model->get_submittedans($_GET['uid'], $_GET['cid'], $_GET['mid'], $_GET['sid']);
			$modules = $this->Main_model->get_table('modules', array('id'=>$_GET['mid']));
		}
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/submittedanswer',array('answers'=>$answers, 'modules'=>$modules));
		$this->load->view('Auditor/footer');
	}
	

	
	public function viewquestion() {
		$this->checkLogin();
		
		$questions = $this->Main_model->get_questions('question',array('isdeleted'=>1));
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/viewquestion',array('questions'=>$questions));
		$this->load->view('Auditor/footer');
	}
	
	public function payment() {
		$this->checkLogin();
		
		$payment_data = $this->Main_model->get_payment();
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/viewpayment', array('payment_data'=>$payment_data));
		$this->load->view('Auditor/footer');
	}
	
	public function setting() {
		$this->checkLogin();
		
		if(isset($_POST['add_percentage'])) {
			$this->Main_model->update_data('settings', array('setting_value'=>$_POST['percentage'], 'updatedat'=> date('Y-m-d h:i:s')), array('setting_key'=>'passing_percentage'));
		}
		
		$percentage = $this->Main_model->get_table("settings",array('setting_key'=>'passing_percentage'));
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/setting', array('percentage'=>$percentage));
		$this->load->view('Auditor/footer');
	}
	
	public function userexamresult() {
		$this->checkLogin();
		
		$exam_users = $this->Main_model->get_examuser();
		$passing_per = $this->Main_model->get_table("settings",array('setting_key'=>'passing_percentage'));
		// print_r($exam_users);
		$this->load->view('Auditor/header');
		$this->load->view('Auditor/examuserresult', array('exam_users'=>$exam_users));
		$this->load->view('Auditor/footer');
		
	}
	
}








