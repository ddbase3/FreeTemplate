<?php

namespace FreeTemplate;

use Api\IPlugin;
use Api\ICheck;

class FreeTemplatePlugin implements IPlugin, ICheck {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "freetemplateplugin";
	}

	// Implementation of IPlugin

	public function init() {

		$this->servicelocator
			->set($this->getName(), $this, true)
			;

		$this->servicelocator
			// overwriting StandardServiceSelector chosen in index.php
			->set('serviceselector', \ServiceSelector\LangBased\LangBasedServiceSelector::getInstance(), true);

	}

	// Implementation of ICheck

	public function checkDependencies() {
		return array(
			"moduledpageplugin_installed" => $this->servicelocator->get('moduledpageplugin') ? "Ok" : "moduledpageplugin not installed"
		);
	}

}

