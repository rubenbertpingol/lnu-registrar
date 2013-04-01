<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class accounting_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		public function login(){
		
			$username	=	$this->input->post('username');
			$password	=	$this->input->post('password');
			$password	=	$this->hash_password($password);
			
			$log		=	$this->db->select('id,username')
									 ->from('tbl_accountant')
									 ->where('username',$username)
									 ->where('password',$password)
									 ->get();
			
			if($log->num_rows() == 1){
				return $log->result();
			}else{
				return false;
			}
		}
		private function hash_password( $password = null ){
		
			$password	= md5($password);
			$password	= sha1("LeyteNormalUniversity".$password);
			$password	= md5($password.$password);
			
			return $password;
		}
		public function getRequests( $perPage = null ,$pageNum = null ){
			/*$checkRequests	=	$this->checkRequests();
			
			if(!empty($checkRequests)){*/
				$requests	=	$this->db->select('tbl_client.id,tbl_doc.doc_name, tbl_client.name,tbl_client.studNum, tbl_client.permanentAddress, tbl_request.level, tbl_request.date as request_date, tbl_request.id as request_id')
										 ->from('tbl_request')
										 ->join('tbl_client','tbl_request.client_id = tbl_client.id')
										 ->join('tbl_doc','tbl_request.doc_id = tbl_doc.id')
										 ->order_by('tbl_request.id','ASC')
										 //->group_by('tbl_client.name')
										 //->limit( 3, $pageNum)
										 ->get();
								 
				if($requests->num_rows() != 0 ){
					$data	=	array();
					foreach( $requests->result() as $key ){
						$query	=	$this->db->where('request_id',$key->request_id)->from('tbl_request_payment')->limit(1)->get();
						
						if( $query->num_rows() == 1){
							continue;
						}else{
							$data[]	=	$key;
						}
					}
					return $data;
				}else{
					return false;
				}
			/*}else{
				
				$requests	=	$this->db->select('*,tbl_request.date as request_date,tbl_request.id as request_id')
								 ->from('tbl_request')
								 ->join('tbl_client','tbl_request.client_id = tbl_client.id')
								 ->join('tbl_doc','tbl_request.doc_id = tbl_doc.id')
								 ->join('tbl_request_payment','tbl_request_payment.request_id != tbl_request.id','left')
								 ->order_by('tbl_request.id','ASC')
								//->limit(2,$pageNum)
								 ->get();
								 
				if($requests->num_rows() != 0 ){
					return $requests->result();
				}else{
					return false;
				}
			}*/
		}
		public function confirmRequest(){
			
			$requestId	=	$this->input->post('requestId');
			$date		=	date('Y-m-d, H:i:s');
			$log		=	$this->db->insert("tbl_request_payment",array('request_id'=>$requestId, 'date' => $date));
			
			if($log){
				return true;
			}else{
				return false;
			}
		}
		private function checkRequests(){
			$checkRequests	=	$this->db->count_all('tbl_request_payment');
			return $checkRequests;
		}
		public function get_documents($param = null ){
			
			
			$sql = $this->db->select("*,tbl_request.id as req_id")->where($param);
			
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
		public function searchRequest(){
			$datas	=	array();
			$qeue	=	isset($_GET['q'])? $_GET['q'] :"";
			$type	=	isset($_GET['type'])? $_GET['type'] :"";
			if((isset($type) && !empty($type))){
				
				switch((int)$type){
					
					case 2:
						
						$requests	=	$this->db->select('tbl_client.id,tbl_doc.doc_name, tbl_client.name,tbl_client.studNum, tbl_client.permanentAddress, tbl_request.level, tbl_request.date as request_date, tbl_request.id as request_id')
										 ->from('tbl_request')
										 ->join('tbl_client','tbl_request.client_id = tbl_client.id')
										 ->join('tbl_doc','tbl_request.doc_id = tbl_doc.id')
										 ->like('tbl_client.name',$qeue)
										 ->order_by('tbl_request.id','ASC')
										 //->group_by('tbl_client.name')
										 //->limit( 3, $pageNum)
										 ->get();
								 
						if($requests->num_rows() != 0 ){
							$data	=	array();
							foreach( $requests->result() as $key ){
								
								$query	=	$this->db->where('request_id',$key->request_id)->from('tbl_request_payment')->limit(1)->get();
								
								if( $query->num_rows() == 1){
									continue;
								}else{
									$datas[]	=	$key;
								}
							}
							$data['result']	=	$datas;
						}else{
							$data['result'] = array();
						}
						$data['type']	=	$type;
						break;
					case 3:
					
						$requests	=	$this->db->select('tbl_client.id,tbl_doc.doc_name, tbl_client.name,tbl_client.studNum, tbl_client.permanentAddress, tbl_request.level, tbl_request.date as request_date, tbl_request.id as request_id')
										 ->from('tbl_request')
										 ->join('tbl_client','tbl_request.client_id = tbl_client.id')
										 ->join('tbl_doc','tbl_request.doc_id = tbl_doc.id')
										 ->like('tbl_request.id',(int)$qeue)
										 ->order_by('tbl_request.id','ASC')
										 //->group_by('tbl_client.name')
										 //->limit( 3, $pageNum)
										 ->get();
								 
						if($requests->num_rows() != 0 ){
							$data	=	array();
							foreach( $requests->result() as $key ){
								$query	=	$this->db->where('request_id',$key->request_id)->from('tbl_request_payment')->limit(1)->get();
								
								if( $query->num_rows() == 1){
									continue;
								}else{
									$datas[]	=	$key;
								}
							}
							$data['result']	=	$datas;
						}else{
							$data['result'] = array();
						}
					
						$data['type']	=	$type;
						break;
					case 1:
						
					default:	
						$requests	=	$this->db->select('tbl_client.id,tbl_doc.doc_name, tbl_client.name,tbl_client.studNum, tbl_client.permanentAddress, tbl_request.level, tbl_request.date as request_date, tbl_request.id as request_id')
										 ->from('tbl_request')
										 ->join('tbl_client','tbl_request.client_id = tbl_client.id')
										 ->join('tbl_doc','tbl_request.doc_id = tbl_doc.id')
										 ->like('tbl_client.studNum',$qeue,'both')
										 ->order_by('tbl_request.id','ASC')
										 //->group_by('tbl_client.name')
										 //->limit( 3, $pageNum)
										 ->get();
								 
						if($requests->num_rows() != 0 ){
							$data	=	array();
							foreach( $requests->result() as $key ){
								$query	=	$this->db->where('request_id',$key->request_id)->from('tbl_request_payment')->limit(1)->get();
								
								if( $query->num_rows() == 1){
									continue;
								}else{
									$datas[]	=	$key;
								}
							}
							$data['result']	=	$datas;
						}else{
							$data['result'] = array();
						}
						
						$data['type']	=	$type;
						break;
				}
				
				return $data;
			}else if(isset($qeue) && !empty($qeue)){
				
				$requests	=	$this->db->select('tbl_client.id,tbl_doc.doc_name, tbl_client.name,tbl_client.studNum, tbl_client.permanentAddress, tbl_request.level, tbl_request.date as request_date, tbl_request.id as request_id')
										 ->from('tbl_request')
										 ->join('tbl_client','tbl_request.client_id = tbl_client.id')
										 ->join('tbl_doc','tbl_request.doc_id = tbl_doc.id')
										 ->where('tbl_client.studNum',$qeue)
										 ->order_by('tbl_request.id','ASC')
										 //->group_by('tbl_client.name')
										 //->limit( 3, $pageNum)
										 ->get();
								 
						if($requests->num_rows() != 0 ){
							$data	=	array();
							foreach( $requests->result() as $key ){
								$query	=	$this->db->where('request_id',$key->request_id)->from('tbl_request_payment')->limit(1)->get();
								
								if( $query->num_rows() == 1){
									continue;
								}else{
									$datas[]	=	$key;
								}
							}
							$data['result']	=	$datas;
						}else{
							$data['result'] = array();
						}
						
						$data['type']	=	$type;
				
				return $data;
			}else{
				return false;
			}
			
			
			
		}
		public function sendNotification(){
			$to			=	'emailniroca@gmail.com'; // Email Here...
			$email		=	$this->input->post('email');
			$message	=	$this->input->post('message');
			
			return true;
			//mail($to,$email,$mesage);
		}
	}
?>