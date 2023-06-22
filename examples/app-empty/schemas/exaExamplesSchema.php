<?php

namespace MxSoftstart\FrameworkPhp\AppEmpty\schemas;

use MxSoftstart\FrameworkPhp\AppEmpty\classes\Schema;

class ExaExamplesSchema extends Schema {

	function __construct() {

		parent::__construct();
	}
	
	public function create() {

		$this->setName("exaExamples");

		$this->addField("Name", "VARCHAR");
		$this->addField("Age", "INT");
		$this->addField("Price", "FLOAT");
		$this->addField("Description", "TEXT");
		
		$this->addField("prdProducts_Id", "ID");
	}
	
}
?>