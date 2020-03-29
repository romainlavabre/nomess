<?php

namespace App\Controllers;

use NoMess\Core\{
                    ControllerManager,
                    Response
                };
use App\Modules\Admin\Service\ServiceReadStat;
use App\Modules\Admin\ServiceManager;

session_start();

class Admin extends ControllerManager
{
    /**
     * Instance de Response
     *
     * @var Response
     */
    private $response;

    /**
     * Instance de serviceManager
     *
     * @var [ServiceManager]
     */
    private $serviceManager;

    /**
     * Instance de ServiceReadStat
     *
     * @var ServiceReadStat
     */
    private $serviceReadStat;

    /**
     * Injection des dépendances
     *
     * @Inject
     * @param ServiceManager $sm
     */
    public function __construct(ServiceManager $sm, 
                                ServiceReadStat $srs,
                                Response $res)
    {
        $this->serviceManager = $sm;
        $this->serviceReadStat = $srs;
        $this->response = $res;
    }

    /**
     * Formulaire de connexion
     *
     * @Route{"admin", "GET"}
     * @return void
     */
    public function index() : void
    {
        $this->response->render([
            'stamp' => 'Admin:index'
        ]);
    }

    /**
     * Traitement des données de connexion
     *
     * @Route{"admin", "POST"}
     * @return void
     */
    public function treatAuth() : void
    {
        $extract = $this->serviceManager->treatAuth($_POST);
        
        $success = $extract === true ? 'true' : 'false';
        
        $this->response->render([
            'stamp' => 'Admin:treatAuth/' . $success
        ]); 
        
    }

    /**
     * Accueil espace admin
     *
     * @Route{"admin/dashboard", "GET", "POST"}
     * @return void
     */
    public function enter() : void
    {
        $this->controlSession();

        $this->response->render([
            'stamp' => 'Admin:enter'
        ]);
    }

    /**
     * Page newsletter
     *
     * @Route{"admin/newsletter", "GET", "POST"}
     * @return void
     */
    public function newsletter() : void
    {
        $this->controlSession();
        $this->setAttribut('newsletter', $this->getSession('newsletter'));

        $this->response->render([
            'stamp' => 'Admin:newsletter',
            'attribut' => $this->getAttribut()
        ]);
    }

    /**
     * Ajout d'une newsletter
     *
     * @Route{"admin/add", "GET", "POST"}
     * @return void
     */
    public function addNewsletter() : void
    {
        $this->controlSession();
        $this->serviceManager->addNewsletter($_POST);

        $this->setAttribut('newsletter', $this->getSession('newsletter'));

        $this->response->render([
            'stamp' => 'Admin:addNewsletter',
            'attribut' => $this->getAttribut()
        ]);
    }

    /**
     * Suppression d'une newsletter
     *
     * @Route{"admin/delete", "GET", "POST"}
     * @return void
     */
    public function deleteNewsletter() : void
    {
        $this->controlSession();
        $this->serviceManager->deleteNewsletter($_GET);

        $this->setAttribut('newsletter', $this->getSession('newsletter'));

        $this->response->render([
            'stamp' => 'Admin:deleteNewsletter',
            'attribut' => $this->getAttribut()
        ]);
    }


    /**
     * Page de gestion de contenu
     *
     * @Route{"admin/content", "GET", "POST"}
     * @return void
     */
    function content() : void
    {
        $this->controlSession();
        $this->setAttribut('contentPage', $this->getSession('contentPage'));
                
        $this->response->render([
            'stamp' => 'Admin:content',
            'attribut' => $this->getAttribut()
        ]);
	}

    /**
     * Mets à jour une section
     *
     * @Route{"admin/content/update", "GET", "POST"}
     * @return void
     */
    function updateSection() : void
    {
        $this->controlSession();
		$extract = $this->serviceManager->updateSection($_POST);

		$this->setAttribut('contentPage', $this->getSession('contentPage'));
		array_merge($extract, $this->getAttribut());
        
        $this->response->render([
            'stamp' => 'Admin:updateSection',
            'attribut' => $this->getAttribut()
        ]);
	}

    /**
     * Réstaure une section
     * 
     * @Route{"admin/content/restore", "GET", "POST"}
     * @return void
     */
    function restoreSection() : void
    {
        $this->controlSession();
		$extract = $this->serviceManager->restoreSection($_POST);

		$this->setAttribut('contentPage', $this->getSession('contentPage'));
		array_merge($extract, $this->getAttribut());
        
        $this->response->render([
            'stamp' => 'Admin:restoreSection',
            'attribut' => $this->getAttribut()
        ]);
    }
    
    /**
     * Lis les statistiques et les retournes à la vue
     * 
     * @Route{"admin/statistic", "GET", "POST"}
     * @return void
     */
    function stat() : void
    {
        $this->controlSession();
		$read = $this->serviceReadStat->treatment();
		$this->setAttribut('stat', $read);
        
        $this->response->render([
            'stamp' => 'Admin:stat',
            'attribut' => $this->getAttribut()
        ]);
	}

    /**
     * Réinitialise un module de statistiques
     *
     * @Route{"admin/statistic/reset", "GET", "POST"}
     * @return void
     */
    function resetStat() : void
    {
        $this->controlSession();
		$this->serviceManager->resetStat($_GET);

	    header('location: ' . WEBROOT . 'admin/statistic');
    }
}
