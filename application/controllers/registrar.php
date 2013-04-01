<?php if( ! defined('BASEPATH') ) exit("No direct script access allowed!");

class Registrar extends CI_Controller
{
	private $isLogged_in = false;
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model("registrar_model");
	}
	
	public function index()
	{
		if(array_key_exists('isRegistrar_logged_in', $_SESSION)){
		
			if(array_key_exists('q',$_GET)){
				if(array_key_exists('search_by', $_GET)){
					$q = $_GET['q'];
					switch($_GET['search_by']){
						case 'request_id':
								$requests = $this->registrar_model->load_search_requests($q, 'id');
							break;
						case 'client_name':
								$requests = $this->registrar_model->load_search_requests($q, 'name');
							break;
						case 'student_number':
								$requests = $this->registrar_model->load_search_requests($q, 'studNum');
							break;
						default:
								$requests = $this->registrar_model->load_search_requests($q, 'studNum');
					}
				}
			} else {
				$requests = $this->registrar_model->load_requests();
			}
		
			$data = array(
				"registrar"	=>	"registrar/index",
				"requests"	=>	$requests
			);
	
			$this->load->view("template/registrar", $data);
		} else {
			redirect(base_url("registrar/login"));
		}
	}
	
	public function cleared()
	{
		if(array_key_exists('isRegistrar_logged_in', $_SESSION)){
			
			$data = array(
				"registrar"		=>		"registrar/cleared",
				"claims"			=>		$this->registrar_model->loadRequestsForRelease()
			);
			
			$this->load->view("template/registrar", $data);
			
		} else {
			redirect(base_url("registrar/login"));
		}		
	}
	
	public function requeststatus()
	{
		if(array_key_exists('isRegistrar_logged_in', $_SESSION)){
			
			$data = array(
				"registrar"		=>		"registrar/pertinent_documents",
				"reqStatus"		=>		$this->registrar_model->onProcessRequest()
			);
			
			$this->load->view("template/registrar", $data);
			
		} else {
			redirect(base_url("registrar/login"));
		}		
	}
	
	public function login()
	{
		if(!array_key_exists('isRegistrar_logged_in', $_SESSION)) {
		
			$data = array(
				"registrar"	=>	"registrar/login"
			);
			
			if(!empty($_POST) && isset($_POST)){
				$login = $this->registrar_model->login();
				
				if(is_array($login) || is_object($login)){
					$data_ = $login[0];
					
					$_SESSION['registrar_session_id'] = $data_->password.$data_->id;
					$_SESSION['registrar_username'] = $data_->username;
					$_SESSION['isRegistrar_logged_in'] = true;
					
					redirect(base_url("registrar"));
					
				} else if($login == false) {
					redirect(base_url("registrar/login?status=failed"));
				}
			}
			
			$this->load->view("template/registrar", $data);
			
		} else {
			redirect(base_url("registrar"));
		}
	}
	
	public function logout()
	{
		session_destroy();
		redirect(base_url("registrar/login"));
	}
	
	public function validateClientData()
	{
		$validateData = $this->registrar_model->validateData();
		
		echo $validateData;
		
	}
	
}