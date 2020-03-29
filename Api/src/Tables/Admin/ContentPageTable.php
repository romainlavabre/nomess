<?php

namespace App\Tables\Admin;


use App\Modules\Admin\Entity\ContentPage;

class ContentPageTable{
	
	/**
	 * Database
	 *
	 * @var \PDO
	 */
	private $db;
	
	/**
	 * Injection de PDO
	 *
	 * @param \PDO $db
	 */
	public function __construct(\PDO $db) {
		$this->db = $db;
	}
	
	/**
	 * Lis les données en base
	 *
	 * @return array|null
	 */
	public function read() : ?array
	{
		$req = $this->db->prepare('SELECT * FROM nm_content_page');
		$req->execute();
		
		$tabContentPage = array();
		
		while($donnee = $req->fetch(\PDO::FETCH_ASSOC)){
			$contentPage = new ContentPage();
			$contentPage->hydrate($donnee);
			
			$tabContentPage[$contentPage->getId()] = $contentPage;
		}
		
		return $tabContentPage;
	}
	
	/**
	 * Créer une nouvelle section
	 *
	 * @param ContentPage $contentPage Section à créer (ex: <br>ceci est ma nouvelle section</br>)
	 * @return void
	 */
	public function create(ContentPage $contentPage) : void
	{
		$req = $this->db->prepare('INSERT INTO nm_content_page (idPage, idBlock, content, valid) VALUES (:idPage, :idBlock, :content, :valid)');
		$req->execute(array(
				'idPage' => $contentPage->getIdPage(),
				'idBlock' => $contentPage->getIdBlock(),
				'content' => $contentPage->getContent(),
				'valid' => 1
		));
	}
	
	/**
	 * Restore une section
	 *
	 * @param ContentPage $contentPage Section à réstorer 
	 * @return void
	 */
	public function update(ContentPage $contentPage) : void
	{
		$req = $this->db->prepare('UPDATE nm_content_page SET valid = :valid WHERE id = :id');
		$req->execute(array(
				'valid' => $contentPage->getValid(),
				'id' => $contentPage->getId()
		));
	}
	
	public function __destruct() {}
}