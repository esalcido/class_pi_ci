<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Login_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function index(){

		 $this->load->library('form_validation');
		 $this->load->helper(array('form'));
		 $this->load->view('login_view')

		echo "login";
	}
}