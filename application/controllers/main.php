<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('database');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function home()
	{
		$quotes=$this->database->get_quotes($this->session->userdata('user'));
		// var_dump($quotes); die();
		$fave_quotes=$this->database->fave_quotes($this->session->userdata('user'));
		// var_dump($fave_quotes); die();
		$things=array('quotes'=>$quotes, 'fave_quotes'=>$fave_quotes);
		// var_dump($things); die();
		$this->load->view('quotes', $things);
	}

	public function register()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm]');
		$this->form_validation->set_rules('confirm', 'Password Confirmation', 'trim|required|min_length[8]|matches[password]');
		$this->form_validation->set_rules('birthdate', 'Date of Birth', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_message('rule', 'Some requirements were not fulfilled correctly. Try again.');
			$this->form_validation->set_message('username_check');
			$this->form_validation->set_message('required', 'Your custom message here');
			$reg_error=array('error'=>'Some requirements were not fulfilled. Try again.', 'class'=>'wrong');
			$this->session->set_flashdata('reg_error', $reg_error);
			redirect('/');
		}
		else
		{
			$this->load->model('database');
			$new_user=$this->input->post();
			$this->database->create($new_user);
			$log_user=$this->database->get_user($new_user);
			$user=array('id'=>$log_user['id'], 'name'=>$log_user['name'], 'alias'=>$log_user['alias'], 'email'=>$log_user['email']);
			$this->session->set_userdata('user', $user);
			redirect('/main/home');
		}
	}

	public function login()
	{
		$user = $this->input->post();
		$log_user=$this->database->login($user);
		if($log_user==TRUE)
		{
			$user=array('id'=>$log_user['id'], 'name'=>$log_user['name'], 'alias'=>$log_user['alias'], 'email'=>$log_user['email']);
			$this->session->set_userdata('user', $user);
			// var_dump($this->session->userdata('user')); die();
			redirect('/main/home');
		}
		else
		{
			$message = array("error"=>"Email and password does not match. Try Again.", "class"=>"wrong");
			$this->session->set_flashdata('error', $message);
			redirect('/');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function new_quote()
	{
		$this->database->new_quote($this->input->post());
		redirect('/main/home');
	}

	public function add_quote($id)
	{
		$this->database->add_quote($id);
		redirect('/main/home');
	}

	public function remove_quote($id)
	{
		$this->database->remove_quote($id);
		redirect('/main/home');
	}




}

//end of main controller