<?php declare(strict_types=1);

namespace FreeTemplate;

use Api\IPlugin;
use Api\ICheck;
use Base3\ServiceLocator;

class FreeTemplatePlugin implements IPlugin, ICheck {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "freetemplateplugin";
	}

	// Implementation of IPlugin

	public function init() {

		$this->servicelocator

			->set($this->getName(), $this, ServiceLocator::SHARED);
	}

	// Implementation of ICheck

	public function checkDependencies() {
		return array(
			"moduledpageplugin_installed" => $this->servicelocator->get('moduledpageplugin') ? "Ok" : "moduledpageplugin not installed"
		);
	}

}

