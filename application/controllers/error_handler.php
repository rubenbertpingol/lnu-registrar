<?php
	Class error_handler extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}
		public function index(){
			show_404();
		}
	}
?>