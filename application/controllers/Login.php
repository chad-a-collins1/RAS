<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('Main_model');
		$this->load->library('javascript');
		
	}
	public function checklogin()
	{
		if(!isset($_SESSION['user_id']))
		{
			redirect(base_url('index.php/Login/login'));
		}
	}	
	/*public function register()
	{
		
		/*$insert_data['name'] = $_POST['name'];
		$insert_data['email'] = $_POST['email'];
		$insert_data['organization'] = $_POST['organization'];
		$insert_data['phoneno'] = $_POST['phoneno'];
		$insert_data['password'] = $_POST['password'];
		
		$insert_id =$this->Main_model->insert_data('user',$insert_data);
		//redirect(base_url().'index.php/Login/register');
		//print json_encode($insert_id);
		/*if(!empty($insert_id))
		{
			$_SESSION['id'] = $insert_id;
					//redirect(base_url().'index.php/User/dashboard');
			echo "success";
			exit;
		}
		else
		{
			echo "invalid_password";
		}*/
	/*$name= $this->input->post('name');
		$email= $this->input->post('email');
		$organization= $this->input->post('organization');
		$phoneno= $this->input->post('phoneno');
		$password= $this->input->post('password');
		
		$data= array(
				'name'=> $name,
				'email'=> $email,
				'organization'=> $organization,
				'phoneno'=> $phoneno,
				'password'=> $password,
				);
		$insert =$this->Main_model->insert_data('user',$data);		
	
		if($insert)
		{
			echo 1;
			//exit;
		}
		else
		{
			echo 0;
			exit;
		}
		
		/*$name = $this->input->post('name');
		$email= $this->input->post('email');
		$organization= $this->input->post('organization');
		$phoneno= $this->input->post('phoneno');
		$password= $this->input->post('password');
		$data = array(
			'name'	=> $name,
			'email' => $email,
			'organization'	=> $organization,
			'phoneno'	=> $phoneno,
			'password'	=> $password,
		);
		
		$insert =$this->Main_model->insert_data('user',$data);	
		echo json_encode($insert);
		$this->load->view('User/register');
	}
		$this->load->view('User/register');
		
	}*/
	public function register()
	{
		
		if(isset($_POST['register'])) {
			// print_r($_POST);
			/*$data['username'] = $_POST['user_name'];
			$data['email'] = $_POST['email'];
			$data['servicetype'] = $_POST['service_type'];
			// $data['approved_auditor'] = $_POST['approved'];*/
			
			$result = $this->Main_model->get_table('user',array('email'=>$_POST['email']));
			
			if(empty($result)) {
				// $salt = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(50 / strlen($x)))), 1, 50);
				// $salted_pass = md5($salt.$_POST['password']);
				// $data['pwsalt'] = $salt;
				// $data['password_md5'] = $salted_pass;
				$data['role'] = "user";
				$data['createdat'] = date('Y-m-d h:i:s');
				$data['name']= $_POST['name'];
				$data['email']= $_POST['email'];
				$data['organization']= $_POST['organization'];
				$data['phoneno']= $_POST['phoneno'];
				$data['password']= $_POST['password'];
				// $user_id = $this->Main_model->insert_data('user',$data);	
				$user_id = 1;	
				if($user_id > 0) 
				{
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_name'] = $_POST['name'];
					
					$email = $_POST['email'];
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
					$txt = "<h2>Thank you for Registering.</h2>";
					$txt .= "<h3>Course List</h3>";
					$courses = $this->Main_model->get_table('courses');
					$txt .= "<table border=1> <thead><th>#</th><th>Course</th><th>Price</th></thead><tbody>";
					foreach($courses as $key=>$course) {
						$txt .= "<tr><td>".($key+1)."</td><td>".$course['coursename']."</td><td>$".$course['price']."</td></tr>";
					}
					$txt .= "</tbody></table>";
					$this->email->message($txt);
					$res = $this->email->send();
					// print_r($res);
					if($res) {			
						echo "mail_send";
					}else {
						// show_error($this->email->print_debugger());
						echo "error";
					}
					// redirect(base_url().'index.php/User/dashboard');
				}
			}else  
			{
				echo "already registered...";
			}
		}
		$this->load->view('User/register');
	}
	public function login()
	{
		if(isset($_POST['login'])) {
			
			$email = $_POST['email'];
			$password = $_POST['password'];
			$user_data = $this->Main_model->get_table('user',array('email'=>$_POST['email']));
		
			if(!empty($user_data)) {
				if($user_data[0]['password'] == $_POST['password']) {
					$_SESSION['user_id'] = $user_data[0]['user_id'];
					$_SESSION['user_name'] = $user_data[0]['name'];
					
					redirect(base_url().'index.php/User/dashboard');
				}else {
					echo "password Not match...";
				}
			}
		}
		
		$this->load->view('User/login');
		
	}
	public function logout()
	{
		session_destroy();	
		redirect(base_url());
	}
	
	public function forget_password_API() {
		$email = $_POST['email'];
		$user_data = $this->Main_model->get_table('user',array('email'=>$email, 'isdeleted'=>0, 'role'=>'user'));
		
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
}