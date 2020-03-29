<?php
/*
 * @eclipse-formatter:off
 */

namespace App\Modules\Admin\Service;

use NoMess\Core\ServiceManager;


class ServiceSession extends ServiceManager
{

    /**
     * Rempli la session à la connexion
     *
     * @return void
     */
    public function treatment(): void
    {
        $tabContentPage = $this->getTable('ContentPage', 'Admin\\')->read();
        
        $tabNewsletter = $this->getTable('newsletter', 'Admin\\')->read();

        $this->setSession('contentPage', $tabContentPage, true);
        $this->setSession('newsletter', $tabNewsletter, true);
        $this->setSession('user', 'user');
    }
}
