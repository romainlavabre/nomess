<?php

namespace App\Modules\Admin\Service;


use NoMess\Core\ServiceManager;
use App\Modules\Admin\Entity\ContentPage;

class ServiceRestoreDbSection extends ServiceManager{

	/*
	 * Instance de contentPage
	 *
	 */
	private $table;

	public function __construct(){
		$this->table = $this->getTable('ContentPage', 'Admin\\');
	}

	/**
	 * Réstaure la section $tabGlob['section'] et invalide la section actuelle
	 *
	 * @param array $tabGlob //contient la section à réstaurer
	 * @return ContentPage
	 */
	public function treatment(array $tabGlob): ContentPage 
	{
		$section = arrayByKey($tabGlob['section'], $this->getSession('contentPage'));

		$section->setValid(1);

		$this->table->update($section);

		foreach($this->getSession('contentPage') as $value){
			if($value->getValid() === "1" && $value->getIdPage() === $section->getIdPage() && $value->getIdBlock() === $section->getIdBlock()){

				$value->setValid(0);

				$this->table->update($value);

				break;
			}
		}

		$tabContentPage = $this->table->read();

		$this->setSession('contentPage', $tabContentPage, true);

		return $section;
	}
}