<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {
	
	function select_limit_manga($limit)
	{
		$sql = "SELECT m.*,c.modify_time,LAST_VALUE(c.chapter) as chapter,c.id as cid FROM `manga` m JOIN `chapter` c ON m.id = c.id_manga WHERE status = 1 GROUP BY (m.id)";
		if ($limit != '') {
			$sql .= " LIMIT $limit";
		}
		$query=$this->db->query($sql);
		return $query;
	}	
	function get_tbl_id($tbl,$id)
	{
		if($id!='')
		{
			$this->db->where(['id'=>$id]);
		}
		$query = $this->db->get($tbl);
		if($query->num_rows() > 0)
		{
	        $row = $query->row();
	        return $row;
	    }
	}
	function get_tbl_alias($tbl,$alias)
	{
		if($alias!='')
		{
			$this->db->where('alias',$alias);
		}
		$query = $this->db->get($tbl);
		if($query->num_rows() > 0)
		{
	        $row = $query->row();
	        return $row;
	    }
	}
	function get_tbl_idManga($tbl,$id)
	{
		if($id!='')
		{
			$sql = "SELECT a.*,b.alias FROM `".$tbl."` a INNER JOIN manga b ON a.id_manga = b.id WHERE id_manga = ".$id."";
		}
		// $query = $this->db->get($tbl);
		$query=$this->db->query($sql);
		if($query->num_rows() > 0)
		{
	        return $query;
	    }

	}
	function select_new_manga($limit_new)
	{
		$sql = "SELECT * FROM `manga`";
		$sql .= "ORDER BY id DESC";
		if ($limit_new != '') {
			$sql .= " LIMIT $limit_new";
		}
		$query=$this->db->query($sql);
		return $query;
	}
	function check_login($email,$password)
	{
		$this->db->where('email',$email);
        $this->db->where('password',md5($password));
        $sql=$this->db->get('user');
        return $sql->row_array();
	}
	function register($username,$email,$password)
	{
		$data = [
		    'username' => $username,
		    'email' => $email,
		    'password' => md5($password),
		    'image' => 'image/avatar/no-user.png'
		];
		$this->db->insert('user', $data);
	}
	function search($keyword,$limit)
	{
		$sql = "SELECT *  FROM `manga`";
		$sql .= " WHERE `name_manga` LIKE '%".$keyword."%'";
		$sql .= " OR 'category' LIKE '%".$keyword."%'";
		if ($limit != '') {
			$sql .= " LIMIT $limit";
		}
		$query=$this->db->query($sql);
		return $query;
	}
	function category($category,$limit,$id)
	{
		$sql = "SELECT m.*,LAST_VALUE(c.chapter) as chapter FROM `manga` m";
		$sql .= " JOIN `chapter` c ON c.id_manga = m.id";
		$sql .=" WHERE `category` LIKE '".$category."' AND m.id !=".$id;
		$sql .=" GROUP BY(m.id)";
		if ($limit != '') {
			$sql .= " LIMIT $limit";
		}
		$query=$this->db->query($sql);
		return $query;
	}
	function get_top($name_top,$limit)
	{
		$sql = "SELECT * FROM `manga`";
		$sql .=" ORDER BY view DESC";
		if ($limit != '') {
			$sql .= " LIMIT $limit";
		}
		$query=$this->db->query($sql);
		return $query;
	}

	public function select_data($tbl, $data, $condition=null,$join=null,$orderBy,$start, $limit, $is_multi = 1){
 		$this->db->select($data);
 		$this->db->from($tbl);
 		if ($join != null) {
 			foreach ($join as $key => $value) {
	 			$this->db->join($key, $value);
	 		}
 		}
 		if ($condition != null) {
 			foreach ($condition as $key => $value) {
 				$this->db->where($key, $value);
 			}
 		}
 		if ($orderBy != null) {
 			foreach ($orderBy as $key => $value) {
	 			$this->db->order_by($key, $value);
	 		}
 		}
 		if ($start != null || $limit != null) {
 			$this->db->limit($start,$limit);
 		}
 		if ($is_multi == 1) {
 			return $this->db->get()->result_array();
 		}else{
 			return $this->db->get()->row_array();
 		}
 	}
 	public function limit_data($tbl, $data, $condition=null,$join=null,$orderBy,$in,$start, $limit, $is_multi = 1){
 		$this->db->select($data);
 		if ($join != null) {
 			foreach ($join as $key => $value) {
	 			$this->db->join($key, $value);
	 		}
 		}
 		if ($condition != null) {
 			foreach ($condition as $key => $value) {
 				$this->db->where($key, $value);
 			}
 		}
 		if ($orderBy != null) {
 			foreach ($orderBy as $key => $value) {
	 			$this->db->order_by($key, $value);
	 		}
 		}
 		if ($in != null) {
 			foreach ($in as $key => $value) {
	 			$this->db->where_in($key, $value);
	 		}
 		}
 		if ($is_multi == 1) {
 			return $this->db->get($tbl,$limit)->result_array();
 		}else{
 			return $this->db->get()->row_array();
 		}

 	}
 	public function updateView($id_chapter,$id_manga)
 	{
 		$this->db->query('UPDATE `chapter` SET view = view + 1 WHERE `id` ='.$id_chapter);
		 $this->db->query('UPDATE `manga` SET view = view + 1 WHERE `id` ='.$id_manga);
 	}
 	public function insert_data($tbl, $data){
 		$this->db->insert($tbl, $data);
 	}
 	public function update_data($tbl, $data, $condition){
		$this->db->update($tbl, $data,$condition);
 	}
 	public function delete_data($tbl,$condition){
        $this->db->delete($tbl,$condition);
	}
	function check_quantity($tbl,$id)
	{
		$this->db->select('name,alias,image,quantity,price_old,discount');
		$this->db->where('id',$id);
		$sql = $this->db->get($tbl);
		return $sql;
	}
}

/* End of file Site.php */
/* Location: ./application/models/Site.php */