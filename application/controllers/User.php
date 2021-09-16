<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		
	}
	public function index()
	{
		$this->load->view('User/index1');
		//$this->load->view('newloginw');
	}
	public function login()
	{
		$this->load->view('User/login');
		
	}
	public function checklogin()
	{
		if(!isset($_SESSION['user_id']))
		{
			redirect(base_url('index.php/Login/login'));
		}
	}
	public function register()
	{
		$this->load->view('User/register');
	}
	
	public function dashboard()
	{
		$this->checklogin();
		$courses = $this->Main_model->get_dashboard_data($_SESSION['user_id']);
		$this->load->view('User/header');
		$this->load->view('User/dashboard', array("courses"=>$courses));
		$this->load->view('User/footer');
		
	}
	public function courses()
	{
		$this->checklogin();
		$courses = $this->Main_model->get_table("courses");
		$this->load->view('User/header');
		$this->load->view('User/courses',array('courses'=>$courses));
		$this->load->view('User/footer');
		
	}
	
	public function cours_payment() 
	{
		$this->checklogin();
		$err = 0;
		$cours_id = $_GET['id'];
		if(isset($_POST['payment'])) 
		{
			// Authorize.net lib
			$this->load->library('Authorize_net');
			$card_no = $_POST['card_no'];
			$exp_date = $_POST['month'].'/'.$_POST['year'];
			$cvv_no = $_POST['cvv_no'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip_code = $_POST['zip'];
			$cours_data = $this->Main_model->get_table('courses',array('courseid'=>$cours_id));
			$amount = $cours_data[0]['price'];
			$auth_net = array(
				'x_card_num'			=> $card_no, // Visa
				'x_exp_date'			=> $exp_date,
				'x_card_code'			=> $cvv_no,
				// 'x_description'			=> 'A test transaction',
				'x_amount'				=> $amount,
				'x_first_name'			=> $name,
				// 'x_last_name'			=> 'Doe',
				'x_address'				=> $address,
				'x_city'				=> $city,
				'x_state'				=> $state,
				'x_zip'					=> $zip_code,
				// 'x_country'				=> 'US',
				// 'x_phone'				=> '555-123-4567',
				// 'x_email'				=> 'test@example.com',
				// 'x_customer_ip'			=> $this->input->ip_address(),
				);
			$this->authorize_net->setData($auth_net);
			
			// Try to AUTH_CAPTURE
			if( $this->authorize_net->authorizeAndCapture() )
			{
				$payment_data['transaction_id'] = $this->authorize_net->getTransactionId();
				$payment_data['auth_code'] = $this->authorize_net->getApprovalCode();;
				$payment_data['response_code'] = $this->authorize_net->getresponsecode(); 
				$payment_data['payment_status'] = $this->authorize_net->getpayment_status();
				$payment_data['payment_response'] = $this->authorize_net->getpayment_responce();
				$payment_data['user_id'] = $_SESSION['user_id'];
				$payment_data['course_id'] = $cours_id;
				$payment_data['amount'] = $amount;
				$payment_data['name'] = $name;
				$payment_data['address'] = $address;
				$payment_data['city'] = $city;
				$payment_data['state'] = $state;
				$payment_data['zip'] = $zip_code;
				$payment_data['createdat'] = date('Y-m-d h:i:s');
				$facilityid=$this->Main_model->insert_data('courspayment',$payment_data);
				
				if($this->authorize_net->getresponsecode() == 1){
					$modules = $this->Main_model->get_table("modules",array('course_id'=>$cours_id, 'isdeleted'=>0));
					foreach($modules as $module) {
						$data['userid'] = $_SESSION['user_id'];
						$data['courseid'] = $cours_id;
						$data['moduleid'] = $module['id'];
						$data['createdat'] = date('Y-m-d h:i:s');
						$this->Main_model->insert_data('uservideoseen',$data);
					}
					$msg = "<h2>Your Payment has been done successfully.</h2>";
					$msg .= "<p><b>Course Name : </b>".$cours_data[0]['coursename']."</p>";
					$msg .= "<p><b>Course Price : </b>$".$cours_data[0]['price']."</p>";
					$msg .= "<p><b>Transaction id :</b> ".$payment_data['transaction_id']."</p>";
					$user_data = $this->Main_model->get_table("user",array('user_id'=>$_SESSION['user_id']));
					
					$email = $user_data[0]['email'];
					$this->load->library('email');
					$config['useragent'] = 'PHPMailer';
					$config['protocol'] = 'smtp';
					$config['smtp_host'] = 'ssl://smtp.gmail.com';
					// $config['smtp_host'] = 'ssl://smtp.googlemail.com';
					$config['smtp_port'] = 465;
					$config['smtp_user'] = 'suryainfotechpc5@gmail.com';
					$config['smtp_pass'] = 'suryainfotech@123';
					$config['charset']  = 'utf-8';
					$config['mailtype'] = 'html';
					$config['wordWrap'] = true;
					$config['validation'] = FALSE;
					$config['smtp_timeout'] = '30';
					$this->email->initialize($config);
					
					$this->email->set_newline("\r\n");
					$this->email->from('suryainfotechpc5@gmail.com', 'eComply');
					$this->email->to($email);
					$this->email->subject('eComply Training and Certification');
					$this->email->message($msg);
					$res = $this->email->send();
				}
				
				redirect(base_url()."index.php/User/dashboard");
			}
			else
			{
				$payment_data['transaction_id'] = $this->authorize_net->getTransactionId();
				$payment_data['auth_code'] = 0;
				$payment_data['response_code'] = $this->authorize_net->getresponsecode(); 
				$payment_data['payment_status'] = $this->authorize_net->getpayment_status();
				$payment_data['payment_response'] = $this->authorize_net->getpayment_responce();
				$payment_data['user_id'] = $_SESSION['user_id'];
				$payment_data['course_id'] = $cours_id;
				$payment_data['amount'] = $amount;
				$payment_data['name'] = $name;
				$payment_data['address'] = $address;
				$payment_data['city'] = $city;
				$payment_data['state'] = $state;
				$payment_data['zip'] = $zip_code;
				$payment_data['createdat'] = date('Y-m-d h:i:s');
				$facilityid=$this->Main_model->insert_data('courspayment',$payment_data);
				$err = 1;
			}
		}
		
		$this->load->view('User/header');
		$this->load->view('User/courspayment',array("err"=>$err));
		$this->load->view('User/footer');
	}
	
		public function viewmodule()
	{
		$modules = $this->Main_model->get_table("modules");
		$this->load->view('User/header');
		$this->load->view('User/viewmodule',array('modules'=>$modules));
		$this->load->view('User/footer');
		
	}
	
	public function payment()
	{
		$this->load->view('User/header');
		$this->load->view('User/payment');
		$this->load->view('User/footer');
		
	}
	public function module()
	{
		$this->checklogin();
		$totMarks = "";
		$userMarks = "";
		$modules = "";
		if(isset($_GET['id'])) {
			$course_id = $_GET['id'];
			$videoseen = $this->Main_model->get_table("uservideoseen",array('userid'=>$_SESSION['user_id'], 'courseid'=>$course_id));
			$courses = $this->Main_model->get_table("courses",array('courseid'=>$course_id));
			$modules = $this->Main_model->get_table("modules",array('course_id'=>$course_id));
			$checkexam = $this->Main_model->get_table("examanswers",array('userid'=>$_SESSION['user_id'], 'course_id'=>$course_id));
			$passing_per = $this->Main_model->get_table("settings",array('setting_key'=>'passing_percentage'));
			$passing_per = $passing_per[0]['setting_value'];
			if(!empty($checkexam)) {
				$totMarks = $this->Main_model->get_totalScore("examanswers",array('userid'=>$_SESSION['user_id'], 'course_id'=>$course_id));
				$userMarks = $this->Main_model->get_rightScore($_SESSION['user_id'], $course_id);
			}
		}
		$username = $_SESSION['user_name'];
		$this->load->view('User/header');
		$this->load->view('User/module',array('modules'=>$modules, 'courses'=>$courses, 'totMarks'=>$totMarks, 'userMarks'=>$userMarks, 'passing_per'=>$passing_per, 'videoseen'=>$videoseen, 'username'=>$username));
		$this->load->view('User/footer');
		
	}
	
	public function exam()
	{
		$this->checklogin();
		
		if(isset($_POST['submitanswer'])) {
	//		 print_r($_POST);

			for($i = 0; $i<= $_POST['totalque']; $i++) {
				$answer_data['questionid'] = $_POST['queId_'.$i];
				if(isset($_POST['que_'.$i])) {
					$answer_data['submitted_answer'] = $_POST['que_'.$i];
				}else {
					$answer_data['submitted_answer'] = "";
				}
				$answer_data['userid'] = $_SESSION['user_id'];
				$answer_data['course_id'] = $_GET['cid'];
				$answer_data['moduleid'] = $_POST['modId_'.$i];
				$answer_data['sectionid'] = $_POST['secId_'.$i];
				$answer_data['createdate'] = date('Y-m-d h:i:s');
				$this->Main_model->insert_data("examanswers",$answer_data);
			}
				redirect(base_url()."index.php/User/module?id=".$_GET['cid']);
		
		}
		$questions = "";
		if(isset($_GET['cid']) && isset($_GET['id']) && isset($_GET['mid'])) {
			// $section_id = $_GET['id'];
			// $section_data = $this->Main_model->get_table("section",array('id'=>$section_id));
			// $modules = $this->Main_model->get_table("modules",array('id'=>$section_data[0]['moduleid']));
			// $questions = $this->Main_model->get_table("question",array('sectionid'=>$section_id));
			
//			$questions = $this->Main_model->get_table("question",array('course_id'=>$_GET['cid'], 'module_id'=>$_GET['mid'], 'sectionid'=>$_GET['id']));
			$questions = $this->Main_model->get_table("question",array('course_id'=>$_GET['cid'],  'sectionid'=>$_GET['id']));
			// print_r($questions);
		}else if(isset($_GET['cid'])) {
			$questions = $this->Main_model->get_table("question",array('course_id'=>$_GET['cid']));
		}
		$this->load->view('User/header');
		$this->load->view('User/exam',array('questions'=>$questions));
		$this->load->view('User/footer');
		
	}
	
	public function modulefile() 
	{
		$this->checklogin();
		$media = "";
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$media = $this->Main_model->get_table('modules',array('id'=>$id));
		}
		$this->load->view('User/header');
		$this->load->view('User/modulefile',array('media'=>$media));
		$this->load->view('User/footer');
	}
	
	public function updatevideoseen() {
		$where['userid'] = $_POST['user_id'];
		$where['courseid'] = $_POST['course_id'];
		$where['moduleid'] = $_POST['module_id'];
		$res = $this->Main_model->update_data('uservideoseen', array('videoseen'=>1), $where);
		echo $res;
	}
	
	public function help()
	{
		$this->load->view('User/header');
		$this->load->view('User/help');
		$this->load->view('User/footer');
		
	}
	public function profile()
	{
		//print_r($_SESSION['user_id']);
	//print_r($_SESSION['admin_id']);
	//exit;
		if(isset($_SESSION['user_id']))
	
		{
			$userdata = $this->Main_model->get_table('user',array('user_id'=>$_SESSION['user_id']));
			//print_r($userdata);
			if(isset($_POST['update']))
			{
				$data=array("name"=>$this->input->post('name'),
			            "email"=>$this->input->post('email'),
			            "organization"=>$this->input->post('organization'),
			            "phoneno"=>$this->input->post('phoneno'),
			            "password"=>$this->input->post('password')
						);
					    
				$update = $this->Main_model->update_data('user',$data,array('user_id'=>$_SESSION['user_id']));		 
			}
		}
		$this->load->view('User/header');
	    $this->load->view('User/profile',array('user'=>$userdata));
		$this->load->view('User/footer');
	}
	public function change_password()
	{
        $this->load->library('form_validation');

        $this->form_validation->set_rules('current_pw', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('new_pw', 'new password', 'required');
        $this->form_validation->set_rules('confirm_pw', 'confirm password', 'required|matches[new_pw]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false) {
            $this->load->view('User/header');
            $this->load->view('User/changepassword');
            $this->load->view('User/footer');
        }
        else 
		{
		//	$id = $this->session->userdata('user_id');
			$newpass = $this->input->post('new_pw');
			$this->Main_model->update_data('user', array('password' => $newpass),array('user_id'=>$_SESSION['user_id']));
			redirect(base_url('index.php/Login/logout'));
        }
    
	}
	 public function password_check($oldpass)
    {
        $user = $this->Main_model->get_table('user',array('user_id'=>$_SESSION['user_id']));
		if($user[0]['password'] !== $oldpass) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }
		return true;
    }
}
