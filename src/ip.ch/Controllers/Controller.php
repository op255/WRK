<?php

namespace App\Controllers;

use App\Views\View;

class Controller {

	public $repo;
	public $view;
	
	public function generateView($contentView, $templateView) {
		$this->view->generate($contentView, $templateView);
	}

	function __construct() {
		$this->view = new View();
	}
}

?>