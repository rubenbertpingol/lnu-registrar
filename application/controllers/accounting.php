<?php
	class accounting extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('accounting_model');
			session_start();
			
		}
		public function index( $pageNum	=	null  ){
			
			if($pageNum != null ){
				$pageNum	=	$pageNum;
			}else{
				$pageNum = 0;
			}
			$this->load->library('pagination');
			$config['base_url'] = base_url('accounting/index/');
			$config['total_rows'] = sizeOf($this->accounting_model->getRequests());
			$config['per_page'] = 2;
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>'; 
			$config['last_tag_close'] = '</li>';
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['cur_tag_open'] = '<li>';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['display_pages'] = FALSE;
			$this->pagination->initialize($config); 
			
			
			if(!$this->sess_Checker()){
				redirect('accounting/signin');
			}else{
				$data['requests']	=	$this->accounting_model->getRequests( $config['per_page'], $pageNum );
				$data['content']	=	'accounting/main/index';
				$this->load->view('accounting/template/template',$data);
			}
		}
		
		public function signin(){
			
			if( $this->sess_Checker() ){
				redirect('accounting');
			}else{
				$this->load->library('form_validation');
				$data['content']	=	'accounting/forms/login';
				$data['css']		= array("public/css/back-end/accounting/login.css");
				$this->load->view('accounting/template/template',$data);
			}
		}
		
		public function login(){
		
			if( $this->sess_Checker() ){
				redirect('accounting');
				die();
			}
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
			
			if($this->form_validation->run() == false){
				$data['content']	=	'accounting/forms/login';
				$data['css']		= array("public/css/back-end/accounting/login.css");
				$this->load->view('accounting/template/template',$data);
			}else{
				if(isset($_POST)){
					$log	=	$this->accounting_model->login();
						
						
						if(!empty($log)){
							
							foreach($log as $value ){
								$_SESSION['accountant_login']	=	true;
								$_SESSION['accountant_userID']	=	$value->id;
								$_SESSION['accountant_userName']	=	$value->username;
							}
							
							redirect('accounting');
						}else{
						
							$data['content']	=	'accounting/errorPages/loginError';
							$this->load->view('accounting/template/template',$data);
							
						}
				}else{
					redirect('accounting/signin');
				}
			}
		}
		private function sess_Checker(){
			if(isset($_SESSION['accountant_login'])){
				return true;
			}else{
				return false;
			}
		}
		public function logout(){
			unset($_SESSION['accountant_login']);
			unset($_SESSION['accountant_userID']);
			unset($_SESSION['accountant_userName']);
			
			session_destroy();
			
			redirect('accounting/signin');
		}
		public function confirmRequest(){
			
			$requestStatus	=	$this->accounting_model->confirmRequest();
			
			if($requestStatus){
				echo 1;
			}else{
				echo 0;
			}
		}
		public function searchRequests(){
			// Remove first Uneccesary characters for security Purpose. Search on preg_match.
			if(isset($_GET)){
				$q = $this->accounting_model->searchRequest();
				
				if(!$q){
					$data['content']	=	'accounting/errorPages/searchError';
					$this->load->view('accounting/template/template',$data);
				}else{
					$data['results']	=	$q;
					$data['content']	=	'accounting/main/searchRequests';
					$this->load->view('accounting/template/template',$data);
				}
			}else{
				show_404();
			}
		}
		
		public function sendNotification(){
			$sendLog	=	$this->accounting_model->sendNotification();
			
			print_r($sendLog);
		}
	}
?>