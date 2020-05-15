<?php


return [


    /*
    ====================================== INTERNAL SERVICE ======================================
	*/
	
	NoMess\Component\RuntimeRewriteUrl\RewriteRule::class			=> DI\autowire(),
	NoMess\Component\LightPersists\LightPersists::class				=> DI\autowire(),
	NoMess\Component\Worker\InteractiveRuntimeWorker::class			=> DI\autowire(),
	NoMess\Service\Tools::class 									=> DI\autowire(),
	NoMess\Service\DataCenter::class 								=> DI\autowire(),
	NoMess\Manager\EntityManager::class 							=> DI\autowire(),
	NoMess\HttpSession\HttpSession::class 							=> DI\autowire(),
	NoMess\HttpResponse\HttpResponse::class							=> DI\autowire(),
	NoMess\HttpRequest\HttpRequest::class 							=> DI\autowire(),
	NoMess\DataManager\DataManager::class 							=> DI\autowire(),
	NoMess\Database\PDOFactory::class 								=> DI\autowire(),
	NoMess\Database\Database::class 								=> DI\autowire(),
    NoMess\Database\IPDOFactory::class 								=> DI\autowire(NoMess\Database\PDOFactory::class)

];
