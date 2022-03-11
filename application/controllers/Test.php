<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	$this->load->model('Site_model');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	public function index()
	{
		echo $this->time_elapsed_string('2022-03-01 00:22:35');
	}
	function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);
	
		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
	
		$string = array(
			'y' => 'năm',
			'm' => 'tháng',
			'w' => 'tuần',
			'd' => 'ngày',
			'h' => 'giờ',
			'i' => 'phút',
			's' => 'giây',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}
	
		if (!$full) $string = array_slice($string, 0, 1);
		echo $string ? implode(', ', $string) . ' trước' : 'vừa xong';
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */