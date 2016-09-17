<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends_model extends CI_Model {

	protected $tbl = 'friends';
	protected $pk = 'id';

	public function __construct()
	{
		parent::__construct();
		
	}

	// getters

	public function get( $id )
	{
		$this->db->where( $this->pk, $id );
		return $this->db->get( $this->tbl );
	}

	/**
	 * get_many will return rows based on:
	 * $conditions - see codeigniter db->where()
	 * $limit - see codeigniter db->limit()
	 * $order - see codeigniter db->order_by()
	 *
	 * @return an array of objects
	 */

	public function get_many( $conditions = FALSE, $limit = array(0,10), $order = array( 'id', 'ASC') )
	{
		if( $conditions ){
			$this->db->where( $conditions );
		}
		$this->db->limit = $limit;
		$this->db->order_by( $order[0], $order[1] );
		return $this->db->get( $this->tbl )->result();
	}

	public function get_all( $conditions = FALSE, $order = array( 'id', 'ASC') )
	{
		if( $conditions ){
			$this->db->where( $conditions );
		}
		$this->db->order_by( $order[0], $order[1] );
		return $this->db->get( $this->tbl )->result();
	}


	/**
	 * get one based on $conditions
	 *
	 * @return object
	 */
	function get_one( $conditions = FALSE )
	{
		if( ! $conditions ){
			return $this->get_many();
		}
		$this->db->where( $conditions );
		return $this->db->get( $this->tbl )->row();
	    
	}

	// setters
	/**
	 * create
	 *
	 * @return bool
	 * @author 
	 */
	function create($formdata)
	{
		$formdata->created = date('Y-m-d h:i:s');
	    return $this->db->insert( $this->tbl, $formdata );
	}

	/**
	 * generic setter
	 *
	 * @return bool
	 * @author 
	 */
	function set($column, $value, $id)
	{
		$this->db->where( $this->pk, $id );
	    return $this->db->update( $this->tbl, array( $column => $value ) );
	}

	function delete( $id ){
		return $this->set( 'deleted', 1, $id );
	}



	function get_friends( $user_id )
	{
		$condition = array( 'user_1' => $user_id );
		return $this->get_all( $condition );
	}
	
}

/* End of file Friends_model.php */
/* Location: ./application/models/Friends_model.php */