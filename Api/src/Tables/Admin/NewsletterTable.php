<?php

namespace App\Tables\Admin;


use NoMess\Core\AppManager;
use App\Modules\Admin\Entity\Newsletter;

class NewsletterTable extends AppManager{

	/**
	 * Undocumented variable
	 *
	 * @var [PDO]
	 */
	private $database; 

	/**
	 * Undocumented function
	 *
	 * @param \PDO $db
	 */
	public function __construct(\PDO $db) 
	{
		$this->database = $db;
	} 

	/**
	 * Undocumented function
	 *
	 * @return array|null
	 */
	public function read(): ?array 
	{
		$req = $this->database->prepare('SELECT * FROM nm_newsletter');
		$req->execute();

		$tabNewsletter = array();

		while($donnee = $req->fetch(\PDO::FETCH_ASSOC))
		{
			$newsletter = new Newsletter();
			$newsletter->hydrate($donnee);

			$tabNewsletter[$newsletter->getId()] = $newsletter;
		}

		return $tabNewsletter;
	}

	/**
	 * Undocumented function
	 *
	 * @param Newsletter $newsletter
	 * @return void
	 */
	public function create(Newsletter $newsletter): void 
	{
		$req = $this->database->prepare('INSERT INTO nm_newsletter (email) VALUES (:email)');
		$req->execute(array(
				'email' => $newsletter->getEmail()
		));
	}

	/**
	 * Undocumented function
	 *
	 * @param [int] $id
	 * @return void
	 */
	public function delete($id): void
	{
		$req = $this->database->prepare('DELETE FROM nm_newsletter WHERE id = :id');
		$req->execute(array(
				'id' => $id
		));
	}

	public function __destruct() {}
}