<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}


	
	public function insert_order_detail($data)
	{
		$this->db->insert('panier', $data);
	}
}