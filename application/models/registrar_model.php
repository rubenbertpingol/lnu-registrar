<?php if ( ! defined('BASEPATH') ) exit("No direct script access allowed!");

class Registrar_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
	}
	
	public function login()
	{	
		$this->form_validation->set_rules("username","Username","trim|required|xss_clean");
		$this->form_validation->set_rules("password","Password","trim|required|xss_clean");
		$this->form_validation->set_error_delimiters('<div class=\'alert alert-error\'>','</div>');
		
		if($this->form_validation->run() == FALSE) {
			return "invalid";
		} else {
			$username = mysql_real_escape_string($this->input->post("username"));
			$password = mysql_real_escape_string($this->input->post("password"));
			
			$sql = $this->db->where('username', $username)
									->where('password', $this->hash_password($password))
									->from('tbl_registrar')
									->limit(1)
									->get();
			if($sql->num_rows() == 1){
				return $sql->result();
			} else {
				return false;
			}
		}
	}
	
	public function hash_password( $password = null)
	{
		if($password != null){
			
			$password = md5($password);
			$password = sha1("LeyteNormalUniversity".$password);
			$password = md5($password.$password);
			
			return $password;
		}
	}
	
	public function load_requests($param = null)
	{
		if( $param == null ) {
			$sql = $this->db->select('*,tbl_request.id as req_id')->where("status","0");	
		} else {
			$sql = $this->db->select("*,tbl_request.id as req_id")
											->where($param);
		}
		
		$sql = $this->db->from('tbl_request')
										->join('tbl_client','tbl_client.id=tbl_request.client_id')
										->join('tbl_doc','tbl_doc.id=tbl_request.doc_id');
										
		if( $param == null ) {
			$sql = $this->db->group_by('tbl_client.name');
		} else {
			$sql = "";
		}
			$sql = $this->db->get();
						
		if( $sql->num_rows() > 0 )
		{
			$data = array();
			foreach($sql->result() as $row){
				// $checkIfReleased = $this->db->where("request_id", $row->id)->from("tbl_release")->get();
				// if($checkIfReleased->num_rows() == 1){
					// continue;
				// } else {
					$data[] = $row;
				// }
			}
			return $data;
		} else {
			return false;
		}
	}
	
	public function load_search_requests($q = null, $by = null)
	{
		// $sql = $this->db->select('*');
		
		$q = substr($q, 1, strlen($q));
		
		switch($by)
		{
			case 'id':
				$sql = $this->db->select('*,tbl_request.id as req_id')
												->like("tbl_request.id", $q, "both")
												->where("status","0")
												->from("tbl_request")
												->join('tbl_client','tbl_client.id=tbl_request.client_id')
												->join('tbl_doc','tbl_doc.id=tbl_request.doc_id')
												->group_by('tbl_client.name')
												->get();
				
				$data = $sql->result();
				
				break;
			case 'name':
				
				$data = $this->loadRequestByClient("name", $q);
				
				break;
			case 'studNum':
				
				$data = $this->loadRequestByClient("studNum", $q);
			
				break;
			default:
		}
		return $data;
	}
	
	public function loadRequestByClient($field = null, $q = null)
	{
		if(!is_null($field) && !is_null($q))
		{
			$sql = $this->db->like($field, mysql_real_escape_string($q), "both")
											->from("tbl_client")
											->get();
			if($sql->num_rows() > 0)
			{
				foreach($sql->result() as $row)
				{
					return $this->load_requests(array($field=>$row->$field));
				}
			}
			
		}
	}
	
	public function loadRequestsForRelease()
	{
		$sql = $this->db->select('*')
										->where("status","1")
										->from("tbl_request")
										->join('tbl_client','tbl_client.id=tbl_request.client_id')
										->join('tbl_doc','tbl_doc.id=tbl_request.doc_id')
										->group_by("tbl_client.name")
										->get();
		if($sql->num_rows() > 0)
		{
			return $sql->result();
		} else {
			return false;
		}
	}
	
	public function onProcessRequest()
	{
		$sql = $this->db->select('*')
										->where("status","0")
										->from("tbl_request")
										->join('tbl_client','tbl_client.id=tbl_request.client_id')
										->join('tbl_doc','tbl_doc.id=tbl_request.doc_id')
										->get();
		if($sql->num_rows() > 0){
			return $sql->result();
		} else {
			return false;
		}
	}
	
	public function onRelease()
	{
		$sql = $this->db->select('*')
										->where('status','1')
										->from('tbl_request')
										->join('tbl_client','tbl_client.id=tbl_request.client_id')
										->join('tbl_doc','tbl_doc.id=tbl_request.doc_id')
										->group_by('claim_type')
										->get();
										
		if($sql->num_rows() > 0){
			return $sql->result();
		} else {
			return false;
		}
	}
	
	public function followUp_payments($param = null)
	{
		if( $param != null ) {
			$sql = $this->db->where($param);
		}
			$sql = $this->db->from("tbl_request_payment")
											->get();
		return $sql->result();
		
	}
	
	public function validateData()
	{
		$sql1 = $this->db->select("*")->where($_POST)->from("tbl_request")->get();
		
		$row1 = $sql1->result();
		$row1 = get_object_vars($row1[0]);
		
		$status = array(
			"status"	=>	"1"
		);
		
		// foreach($sql1->result() as $row){
			// $dataTo_insert = array(
				// "request_id"	=>	$row->id,
				// "date"				=>	date("Y-m-d")
			// );
			// $ins = $this->db->insert("tbl_release",$dataTo_insert);			
		// }
		
				
		$this->db->where("client_id",$_POST['client_id']);
		
		$updt = $this->db->update("tbl_request", $status);
				
		if($updt){
			return true;
		} else {
			return false;
		}
		
	}
	
}