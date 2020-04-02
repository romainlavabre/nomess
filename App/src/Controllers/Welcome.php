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
	 * @var ServiceManagerSample
	 */
	private $sm;

	/**
	 * With php-di
	 *
	 * @Inject
	 */
	public function __construct(ServiceManagerSample $serviceManagerSample,
								Response $res) 						
	{
		$this->sm = $serviceManagerSample;
		$this->response = $res;
	}

	/**
	 * @Route{"", "GET"} 
	 *
	 * @return void
	 */
	function index() : void
	{
		$this->sm->sample();

		$this->setAttribut('mixed key', 'mixed value');

		$this->response->render([
				'stamp' => 'Welcome:index',
				'attribut' => $this->getAttribut()
		]);
	}
}

?>