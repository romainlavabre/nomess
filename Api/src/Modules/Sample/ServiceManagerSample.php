<?php
namespace App\Modules\Sample;


use NoMess\Core\ServiceGrantManager;
use App\Modules\Sample\Service\ServiceSample;

class ServiceManagerSample extends ServiceGrantManager
{

	/**
	 * With PHP-DI 6
	 * 
	 * @Inject
	 * @var ServiceSample
	 */
	private $serviceSample;

	public function sample() 
	{
		$data = $this->serviceSample->treatment();
		/*$table = $this->getTable('Sample');
		$table->read();
		$table->create($data);
		$table->update($data);
		$table->delete($data);*/

		return 'data';
	}
}
