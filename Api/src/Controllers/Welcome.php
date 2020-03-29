<?php
namespace App\Controllers;


use NoMess\Core\{
	ControllerManager,
	Response
};
use App\Modules\Sample\ServiceManagerSample;

class Welcome extends ControllerManager{

	/**
	 * Instance de Response
	 *
	 * @var Response
	 */
	private $response;

	/**
	 * Instance de ServiceManager
	 *
	 * @var ServiceManager
	 */
	private $serviceManager;

	/**
	 * With php-di
	 *
	 * @Inject
	 */
	public function __construct(ServiceManagerSample $serviceManagerSample,
								Response $res) 						
	{
		$this->serviceManager = $serviceManagerSample;
		$this->response = $res;
	}

	/**
	 * @Route{"accueil", "GET"}
	 *
	 * @return void
	 */
	function index() : void
	{
		$this->serviceManager->sample();

		$this->response->render([
				'stamp' => 'Welcome:index',
				'attribut' => $this->getAttribut()
		]);
	}
}

?>