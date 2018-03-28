<?php
class Usersmodel extends CI_Model
{
	 public function __construct()
	{
		parent::__construct();
		$this->load->database();
		 
	}
	public function getItemsUsers()
	{
		$query=$this->db->get('users');
		return $query->result_array();
		//git pr2
	}
}