<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	private $user_id = FALSE;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('posts_model');
		if( ! $this->users_model->is_logged_in() ) redirect(site_url('user/login'));
		$this->user_id = $_SESSION['user_id'];
	}

	public function index()
	{
		
		$data = new stdClass();
		$data->page_title = 'Home';

		// form handlers
		$data->post_handler = site_url('post/do_post');

		// other data
		$data->posts = $this->posts_model->get_many( array('user_id' => $this->user_id), array(0, 10), array('created', 'DESC'));

		$this->load->view('home/index', $data);
	}

	public function browse()
	{
		$data = new stdClass();
		$data->nonfriends = $this->users_model->get_nonfriends();
		$data->page_title = 'Browse Non Friends';
		$this->load->view('home/browse', $data);
	}

	public function friends()
	{
		$data = new stdClass();
		$data->friends = $this->users_model->get_friends();
		$data->page_title = 'My Friends';
		$this->load->view('home/friends', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */