<?php
require ("../phpServices/sessionService.php");
class LoginController {
		
	public function __construct() {
	}
	
	public function initServices(){
		$this->ss= new sessionService();
	}
	
	public function loginCont($login,$usuario,$password){
		echo $usuario.",".$password;
		$isLogged= $this -> ss -> login($login,$usuario,$password);
		return isLogged;
	}
}
?>