<?php
namespace App\Modules\Admin;


use NoMess\Core\ServiceGrantManager;
use App\Modules\Admin\Service\{
									ServiceUpdateXmlSection,
									ServiceUpdateDbSection,
									ServiceSession,
									ServiceRestoreDbSection,
									ServiceResetStat
								};
use App\Modules\Admin\Entity\Newsletter;

class ServiceManager extends ServiceGrantManager
{

	/**
	 *
	 * @var ServiceSession
	 */
	private $serviceSession;

	/**
	 * Instance de newsletter
	 *
	 * @var Newsletter
	 */
	private $newsletter;

	/**
	 * Instance de ServiceUpdateDbSection
	 *
	 * @var ServiceUpdateDbSection
 	*/
	private $serviceUpdateDbSection;
	
	/**
	 * Instance de ServiceUpdateXmlSerction
	 *
	 * @var ServiceUpdateXmlSection
	 */
	private $serviceUpdateXmlSection;

	/**
	 * Instance de ServiceRestoreDbSection
	 *
	 * @var ServiceRestoreDbSection
	 */				
	private $serviceRestoreDbSection;

	/**
	 * Instance de ServiceResetStat
	 *
	 * @var ServiceResetStat
	 */
	private $serviceResetStat;

	/**
	 * Injection des dépendances
	 *
	 * @Inject
	 * @param ServiceSession $serviceSession
	 */
	public function __construct(ServiceSession $serviceSession, 
								Newsletter $e, 
								ServiceUpdateDbSection $serviceUpdateDbSection, 
								ServiceUpdateXmlSection $serviceUpdateXmlSection,
								ServiceRestoreDbSection $serviceRestoreDbSection,
								ServiceResetStat $serviceResetStat)
	{
		$this->serviceSession = $serviceSession;
		$this->newsletter = $e;
		$this->serviceUpdateDbSection = $serviceUpdateDbSection;
		$this->serviceUpdateXmlSection = $serviceUpdateXmlSection;
		$this->serviceRestoreDbSection = $serviceRestoreDbSection;
		$this->serviceResetStat = $serviceResetStat;

	}

	/**
	 * Traitement du formulaire de connexion
	 * 
	 * @param [array] $tabGlob
	 * @return mixed
	 */
	public function treatAuth(array $tabGlob) 
	{
		global $auth; // Depuis le fichier de config

		if($tabGlob['email'] === $auth['email'] && $tabGlob['mdp'] === $auth['mdp']){
			$this->serviceSession->treatment();

			return true;
		}else{
			$this->setAttribut('error', 'Identifiant ou mot de passe incorrect');
			return $this->getAttribut();
		}
	}

	/**
	 * Ajout d'une newsletter
	 *
	 * @param [array] $tabGlob
	 * @return void
	 */
	public function addNewsletter(array $tabGlob) : ?array
	{
		$error = $this->checkData($tabGlob);

		if($error == null){
			$this->newsletter->hydrate($tabGlob);

			$table = $this->getTable('Newsletter', 'Admin\\');
			$table->create($this->newsletter);
			$tabNewsletter = $table->read();

			$this->setSession('newsletter', $tabNewsletter, true);
		}else{
			$this->setAttribut('error', $error);
		}

		return $this->getAttribut();
	}

	/**
	 * Suppression d'un newsletter
	 *
	 * @param array $tabGlob
	 * @return void
	 */
	public function deleteNewsletter(array $tabGlob) : void
	{
		$table = $this->getTable('Newsletter', 'Admin\\');
		$table->delete($tabGlob['key']);
		$tabNewsletter = $table->read();

		$this->setSession('newsletter', $tabNewsletter, true);

		$this->setAttribut('success', 'Email supprimé');

		$this->redirect('admin/newsletter');
	}

	/**
	 * Mets à jour une section (en base et fichier xml)		
	 *
	 * @param array $tabGlob Tableau contenant le contenu de la future section
	 * @return array|null
	 */
	public function updateSection(array $tabGlob) : ?array
	{
		$error = $this->checkData($tabGlob);

		if($error === null){

			$section = $this->serviceUpdateDbSection->treatment($tabGlob); //Archive l'ancienne section et créer une nouvelle version

			$extract = $this->serviceUpdateXmlSection->treatment($section);//Mise à jour du fichier XML

			$this->setAttribut('info', $extract);

		}else{
			$this->setAttribut('error', $error);
		}

		return $this->getAttribut();
	}

	/**
	 * Réstore une ancienne section et invalide l'actuelle
	 *
	 * @param array $tabGlob //Section à réstaurer
	 * @return array|null
	 */
	public function restoreSection(array $tabGlob) : ?array
	{
		$error = $this->checkData($tabGlob);

		if($error === null){

			$section = $this->serviceRestoreDbSection->treatment($tabGlob);

			$extract = $this->serviceUpdateXmlSection->treatment($section);

			$this->setAttribut('info', $extract);
		}else{
			$this->setAttribut('error', $error);
		}

		return $this->getAttribut();
	}

	/**
	 * Réinitialise un module de statistiques
	 *
	 * @param array $tabGlob Retour du formulaire, contient l'identifiant du module de statistique
	 * @return mixed
	 */
	public function resetStat(array $tabGlob)
	{
		$error = $this->checkData($tabGlob);

		if($error === null){
			$this->serviceResetStat->treatment($tabGlob);
		}else{
			$this->setAttribut('error', 'Une erreur s\est produite');
			return $this->getAttribut();
		}
	}
}