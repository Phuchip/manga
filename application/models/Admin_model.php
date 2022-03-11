<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct()
	{
	parent::__construct();
	$this->load->model('admin_model');
	}

	function check_login()
	{
		
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */