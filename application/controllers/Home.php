<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		if( ! $this->users_model->is_logged_in() ) redirect(site_url('user/login'));
	}

	public function index()
	{
		
		$data = new stdClass();
		$data->page_title = 'Home';
		$this->load->view('home/index');
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