<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
		$this->load->helper('funtions');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
	public function index()
	{
		$data['content'] = 'site/main';
		$data['canonical'] = base_url();
		$limit = 10;
		$limit_new = 50;
		$limit_top = 7;
		$data['topMonth'] = $this->Site_model->get_top('manga',$limit_top);
		$data['new_manga'] = $this->Site_model->select_new_manga($limit_new);
		$data['query']= $this->Site_model->select_limit_manga($limit);
		$sql=$this->Site_model->get_tbl_id('tbl_meta',1);
		$data['meta_title']=$sql->title;
	    $data['meta_key']=$sql->meta_keyword;
	    $data['meta_des']=$sql->metadesc;
	    $data['robots']='index,follow';
		$this->load->view('site/index',$data);
	}
	public function manga($alias='',$id)
	{
		$data['content'] = 'site/detail';
		$data['canonical'] = base_url().$alias.'-'.$id;
		$data['chapter'] = $this->Site_model->get_tbl_idManga('chapter',$id);
		$data['id_manga'] = $id;
		$sql=$this->Site_model->get_tbl_id('manga',$id);
		$data['query'] = $sql;
		$limit_category = 5;
		$limit_top = 7;
		$data['topMonth'] = $this->Site_model->get_top('manga',$limit_top);
		$category = $sql->category;
		$data['first'] = $this->db->query('SELECT MIN(chapter) as min,id FROM `chapter` WHERE `id_manga` = '.$id)->row();
		$data['last'] = $this->db->query('SELECT LAST_VALUE(chapter) as max,id FROM `chapter` WHERE `id_manga` = '.$id.' LIMIT 1')->row();
		$data['alias']= $alias;
		$data['category'] = $this->Site_model->category($category,$limit_category,$id);
		$data['meta_title']=$sql->name_manga;
	    $data['meta_key']=$sql->alias;
	    $data['meta_des']=$sql->name_manga;
	    $data['robots']='index,follow';
		$this->load->view('site/index', $data);
	}
	public function manga_detail($alias,$chap,$id_chapter)
	{
		$url = $_SERVER['REQUEST_URI'];
		$query = 'SELECT c.*,m.name_manga,m.alias,m.id as mid,m.image FROM chapter c INNER JOIN manga m ON c.id_manga = m.id WHERE c.id = '.$id_chapter;
		$sql= $this->db->query($query)->row();
		$data['query'] = $sql;
		$id = $sql->mid;
		$id_chapter = $sql->id;
		$alias = $sql->alias;
		$data['canonical'] = $canonical = setHref($alias,$id_chapter,$chap);
		if($url != $canonical){
			header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: $canonical"); 
			exit();
		}
		$data['chap'] = $this->Site_model->get_tbl_idManga('chapter',$id);
		$data['meta_title']=$sql->name_manga.'- Chapter '.$chap;
		$data['chapter'] = $chap;
	    $data['meta_key']=$sql->alias;
	    $data['meta_des']=$sql->name_manga;
	    $data['robots']='index,follow';
	    $chap_min = $this->db->query('SELECT MIN(chapter) as min FROM `chapter` WHERE `id_manga` = '.$id)->row();
	    if ($chap_min->min == $chap) {
	    	$data['prev'] = false;
	    }else {
	    	$prev_chap = $chap-1;$prev_id_chap = $id_chapter+1;
	    	$data['prev'] = base_url().$alias.'/chap-'.$prev_chap.'-'.$prev_id_chap.'.html';
	    }
	    $chap_max = $this->db->query('SELECT LAST_VALUE(chapter) as max FROM `chapter` WHERE `id_manga` = '.$id.' LIMIT 1')->row();
	    if($chap_max->max == $chap){
	    	$data['next'] = false;
	    }else {
	    	$next_chap = $chap+1;
	    	$next_id_chap = $id_chapter-1;
	    	$data['next'] = base_url().$alias.'/chap-'.$next_chap.'-'.$next_id_chap.'.html';
	    }
	    $this->Site_model->updateView($id_chapter,$id);
	    // Set read history
	    $_SESSION['read_history'][$id] = array(
			'id_chapter'=>$id_chapter,
			'chapter'=>$chap,
			'name'=>$sql->name_manga,
			'alias'=>$sql->alias,
			'image'=>$sql->image,
		);
		
	    //
	    $data['crawl'] = 'https://vcomic.net/doc-'.$alias.'-chuong-'.$chap.'.html';
	    $data['content'] = 'site/manga-detail';
		$this->load->view('site/index', $data);
	}
	function check_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$output = array('error' => false);
		$login = $this->Site_model->check_login($email, $password);
		if($login){
			$_SESSION['username'] = $login['username'];
			$_SESSION['id'] = $login['id'];
			if (empty($login['image'])) {
				$_SESSION['image'] = 'image/avatar/no-user.png';
			}else{
				$_SESSION['image'] = $login['image'];
			}
			$output['message'] = 'Đăng nhập thành công. Đang chuyển hướng...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Sai thông tin đăng nhập. Vui lòng kiểm tra lại!';
		}
		echo json_encode($output);
	}
	function register()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		$output = array('error' => false);
		$query = $this->db->query("SELECT * FROM user WHERE username = '".$username."' OR email = '".$email."'");
		if ($password != $repassword) {
			$output['error'] = true;
			$output['message'] = 'Mật khẩu nhập không giống nhau !';
		}elseif ($query->num_rows() > 0) {
			$output['error'] = true;
			$output['message'] = 'Tài khoản hoặc email đã có người đăng ký!';
		}else {
			$register = $this->Site_model->register($username,$email,$password);
			$output['message'] = 'Đăng ký tài khoản thành công. Vui lòng đăng nhập...';
		}
		echo json_encode($output);
	}
	function logout()
	{
		$this->session->sess_destroy('username','image');
		redirect();
	}
	function load_search()
	{
		$keyword = $_POST['keyword'];
		$limit = 5;
		if (!empty($keyword)) {
			$data = $this->Site_model->search($keyword,$limit);
			$output ="";
			if ($data->num_rows()>0) {
				foreach ($data->result() as $key => $row) {
					$output .= "
						<li>
							<a href='".base_url().$row->alias.'-'.$row->id."'>
								<img src='".$row->image."'>
								<h3>".$row->name_manga."</h3>
								<h4>
									<i>Thể loại : ".$row->category."</i>
									<i>".$row->name_manga."</i>
								</h4>
							</a>
						</li>
					";
				}
			}
			else {
				$output .= "
				<ul>
					<li style='text-align: center;''>Không có kết quả phù hợp</li>
				</ul>
				";
			}
			echo $output;
		}
	}
	function search($value='')
	{
		echo 'string';
	}
	function check()
	{
		if (isset($_SESSION['id'])) {
			echo 'Bạn đã đăng nhập';
		}else {
			echo 'Bạn chưa đăng nhập';
		}
	}
	function add_comment_manga()
	{
		$error = '';
		$comment_content = '';
		$time = time();
		if (isset($_SESSION['id'])) {
			$id = $_POST["comment_id"];
			$parent_id = $_POST["parent_id"];
			$id_user = $_SESSION['id'];
			if(empty($_POST["comment_content"]))
			{
				$error .= '<p class="text-danger">Nội dung bình luận là bắt buộc</p>';
			}
			else
			{
				$comment_content = $_POST["comment_content"];
			}
			if ($error == '') {
				$query = "INSERT INTO `comment_manga` (`id`, `parent_comment_id` , `id_manga`, `id_user` ,`comment`, `create_time`, `status`) VALUES (NULL, '".$parent_id."' ,'".$id."', '".$id_user."' ,'".$comment_content."','".$time."', '1')";
				$this->db->query($query);
			}
			$error = '<label class="text-success">Thêm bình luận thành công !</label>';
			
		}else {
			$error .= '
				<p class="text-danger">Bạn phải đăng nhập để bình luận. <a style="color:green" type="button" data-toggle="modal" data-target="#Modal">Click vào đây</a></p>
				
			';
		}
		$data = array(
			'error'  => $error
		);
		echo json_encode($data);
		
	}
	function fetch_comment()
	{
		$id_manga = $_POST['id_manga'];
		$query = "SELECT a.*,b.username,b.image FROM `comment_manga` a INNER JOIN user b ON a.id_user = b.id INNER JOIN manga c ON a.id_manga=c.id WHERE a.status = 1 AND a.id_manga = '".$id_manga."' AND a.parent_comment_id = 0 ORDER BY create_time DESC";
		$data = $this->db->query($query);
		$output = '';
		foreach ($data->result() as $value) {
			$output .='
				<li>
					<div class="image-li-content-comment">
						<img class="lazyload" src="images/icon/loading.gif" data-src="'.$value->image.'">
						<span class="role-user-comment bg-user-type-1">Thành viên</span>
					</div>
					<div class="content-li-content-comment">
						<div class="three-dots-comments">
							<span>...</span>
							<div class="action-three-dots-comments" style="display: none;">
								<p data-type="report" data-id="">Báo cáo</p>
							</div>
						</div>
						<div class="h3-span-content-li-content-comment">
							<h3>'.$value->username.'</h3>
							<span>'.timeFormat($value->create_time).'</span>
						</div>
						<span class="summary-content-li-content-comment">
							'.$value->comment.'
						</span>
						<a class="reply" href="javascript:void(0)" id="'.$value->id.'">Trả lời</a>
					</div>
				</li>
			';
			$output .= $this->get_reply_comment($value->id,$id_manga);
		}
		echo $output;
	}
	function get_reply_comment($parent_id=0,$id_manga)
	{
		$query = "SELECT a.*,b.username,b.image FROM `comment_manga` a INNER JOIN user b ON a.id_user = b.id INNER JOIN manga c ON a.id_manga=c.id WHERE a.status = 1 AND a.id_manga = '".$id_manga."' AND a.parent_comment_id = '".$parent_id."' ";
		$output = '';
		$data = $this->db->query($query);
		$count = $data->num_rows();
		if($count > 0)
		{
			foreach($data->result() as $value)
			{
				$output .= '
					<div class="repy-area">
						<ul class="ul-content-comment">
							<li>
								<div class="image-li-content-comment">
									<img class="lazyload" src="images/icon/loading.gif" data-src="'.$value->image.'">
									<span class="role-user-comment bg-user-type-1">Thành viên</span>
								</div>
								<div class="content-li-content-comment" style="margin-bottom: 15px;">
									<div class="three-dots-comments">
										<span>...</span>
										<div class="action-three-dots-comments" style="display: none;">
											<p data-type="report" data-id="">Báo cáo</p>
										</div>
									</div>
									<div class="h3-span-content-li-content-comment">
										<h3>'.$value->username.'</h3>
										<span>'.timeFormat($value->create_time).'</span>
									</div>
									<span class="summary-content-li-content-comment">
										'.$value->comment.'
									</span>
								</div>
							</li>
						</ul>
					</div>
				';
				
			}
		}
		return $output;
	}
	public function deleteSidebar()
	{
		$id = $this->input->post('id');
		unset($_SESSION['read_history'][$id]);
		$num = count($_SESSION['read_history']);
		if($num == 0){
			unset($_SESSION['read_history']);
		}
	}
	function crawl()
	{
		$url = 'https://vlogtruyen.net/ban-hoc-cua-toi-la-linh-danh-thue.html';
		require_once APPPATH.'libraries/simple_html_dom.php';
        $html = file_get_html($url);
    //     foreach ($html->find('.page-chapter img') as $element) {
    //     	echo $element;
    //     }
  		// echo $html;
  		// echo '<img src="http://img.baotangtruyentranh.com/Upload/ImageContent/20211002/hoan-doi-dieu-ky-chapter-353-1.jpg" />';
	    // foreach ($html->find('.ul-list-chaper-detail-commic li') as $element) {
	    // 	$array = $element->find('span',1)->plaintext;
	    // 	$chap = $element->find('h3',0);
	    // 	$chapter = substr($chap->plaintext,8);
	    // 	if ($this->db->query('INSERT INTO `chapter` (`id`, `id_manga`, `chapter`, `create_time`) VALUES (NULL, 9, "'.$chapter.'", "'.$array.'")')) {
	    // 		echo 'Thêm thành công';
	    // 	}
	    // 	else {
	    // 		echo 'Lỗi';
	    // 	}
	    	
	    // }
	    
	    // $this->db->insert('chapter')
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */