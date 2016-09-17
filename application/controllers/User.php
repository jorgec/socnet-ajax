<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
//		$this->output->enable_profiler(TRUE);
		$this->load->model('users_model');
	}

	public function index()
	{
		
	}

	public function register()
	{
		$data = new stdClass();
		$data->message = '';
		$data->page_title = "Register";
		if( $this->session->flashdata('message') ){
			$data->message = $this->session->flashdata('message');
		}

		$this->load->view('register', $data);
	}

	public function do_register()
	{
		$data = new stdClass();
		$formdata = new stdClass();

		$formdata->username = $this->input->post('username');
		$formdata->email = $this->input->post('email');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');

		$errors = 0;
		$data->message = '';

		if( $password != $password2 ){
			$errors++;
			$data->message .= '<p class="text-danger">Passwords do not match!</p>';
		}

		$email_check = $this->users_model->get_one( array( 'email' => $formdata->email ) );
		if( $email_check ){
			$errors++;
			$data->message .= '<p class="text-danger">Email already exists!</p>';
		}

		$username_check = $this->users_model->get_one( array( 'username' => $formdata->username ) );
		if( $username_check ){
			$errors++;
			$data->message .= '<p class="text-danger">Username already exists!</p>';
		}

		if( $errors == 0 ){
			$formdata->password = md5($password);
			$this->users_model->create( $formdata );
			redirect( site_url('user/login'));
		}else{
			$this->session->set_flashdata('message', $data->message);
			redirect( site_url('user/register'));
		}

	}

	public function login()
	{
		$data = new stdClass();
		$data->message = '';
		$data->page_title = "Login";
		if( $this->session->flashdata('message') ){
			$data->message = $this->session->flashdata('message');
		}

		$this->load->view('login', $data);
	}

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$password = md5($password);

		$credentials = array('username' => $username, 'password' => $password);

		$check = $this->users_model->get_one($credentials);

		if( ! is_null( $check ) ){
		
			$socnet = array(
				'username'	=> $username,
				'user_id'		=> $check->id,
				'logged_in'	=> 1
			);
			
			$this->session->set_userdata( $socnet );
			

			redirect(site_url('home'));
		}else{

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('user/login'));
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */