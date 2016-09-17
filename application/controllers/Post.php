<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('posts_model');
		if( ! $this->users_model->is_logged_in() ) redirect(site_url('user/login'));
	}

	public function index()
	{
		
	}

	public function do_post()
	{
		$formdata = new stdClass();
		$data = new stdClass();
		$formdata->user_id = $_SESSION['user_id'];
		$formdata->content = $this->input->post('content');
		$post = $this->posts_model->create($formdata);

		if( $post ){
			$data->message = 'Status posted!';
			$_SESSION['post_status_message'] = array('success', $data);
		}else{
			$data->message = $this->db->error_message;
			$_SESSION['post_status_message'] = array('error', $data);
		}

		$this->session->mark_as_flash('post_status_message');

		redirect(site_url('home'));

	}

}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */