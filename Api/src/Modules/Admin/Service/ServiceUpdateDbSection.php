<?php

namespace App\Modules\Admin\Service;


use NoMess\Core\ServiceManager;
use App\Modules\Admin\Entity\ContentPage;

class serviceUpdateDbSection extends ServiceManager{
	
	/*
	 * DataBase
	 */
	private $table;
	
    public function __construct() 
    {
		$this->table = $this->getTable('ContentPage', 'Admin\\');
	}
    
    /**
     * Invalide la section actuelle et insert la nouvelle section
     *
     * @param array $tabGlob //Contient la nouvelle section à insérer
     * @return ContentPage
     */
    public function treatment(array $tabGlob): ContentPage 
    {
		$section = arrayByKey($tabGlob['section'], $this->getSession('contentPage'));
		
		$section->setValid(0);
		
		$this->table->update($section);
		
		$tabSection['idPage'] = $section->getIdPage();
		$tabSection['idBlock'] = $section->getIdBlock();
		$tabSection['content'] = $tabGlob['content'];
		
		$newSection = new ContentPage();
		$newSection->hydrate($tabSection);
		$newSection->setValid(1);
		
		$this->table->create($newSection);
		$tabContentPage = $this->table->read();
		
		$this->setSession('contentPage', $tabContentPage, true);
		
		return $newSection;
	}
}