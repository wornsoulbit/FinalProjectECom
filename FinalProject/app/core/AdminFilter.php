<?php

namespace App\core;

//good to help me write DRY code
#[\Attribute]
class AdminFilter{
	function execute(){
		if($_SESSION['role'] == "admin"){
			header('location:'.BASE.'/Default/index');
		}
	}
}
?>