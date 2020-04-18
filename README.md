# Général

NoMess est compatible avec Linux et Mac Os uniquement

Installation
> composer create-project nomess/nomess

*Librairie:*

*PHPUnit*, 
*PHP-DI*, 
*Twig*, 
*+ dépendance*

Requière: 
php7.3 
nomess/kernel


#### Arborescence

NoMess est séparé en deux parties, Application et Web, ces deux dossiers partent en production ainsi que vendor.

---
Application:


`App/src/Controllers` Controllers

`App/src/Modules` Contient les modules de l'application

`App/src/Tables` Contient les requêtes SQL

`App/config` Fichiers de configuration côté application

`App/var/*` Log d'erreur et cache côté application

---
Web


`Web/public/*` Contient tous les fichiers chargés de composer une page pour le client.

`Web/cache` Cache côté web

`Web/template.xml` Contient la configuration 

---
Tests

PHPUnit est intégré pour réaliser les tests

 

`Tests/Modules/*` Contient vos tests unitaire sur le code critique
`Tests/reports/*` Rapport de couverture de code

`cov.sh` Permet de générer un rapport de couverture global.


---
Tools

Le dossier tools contient les utilitaires pour la phase de développement.

`Tools/console.sh`:<br>
1.  Permet de purger les caches
2.  Passer en mode développement ou production
3.  Créer un ou plusieurs crud
4.  Créer un ou plusieurs controllers


# Source de l'application

1.  Controllers
2.  Tables
3.  Modules
>  Au sein de vos modules, placez vos entités et services

#### Controller

*  Hérite de la class abstraite 
>  NoMess\Manager\ControllerManager

Méthodes:

* `doGet(HttpResponse, HttpRequest)`
* `doPost(HttpResponse, HttpRequest)`


#### Service

* RAS


#### Entity

* Peut implémenter 
>  NoMess\Manager\EntityManager
ou implémenter manuellement
> \JsonSerializable::jsonSerialize()

`public function jsonSerialize() : array`
<br>
`{`<br>
    `return get_object_vars($this);`<br>
`}`

<br>
<br>
<br>

### DataManager

Comme son nom l'indique, le DataManager insert vos objets en base et gère l'encapsulation sans limite de profondeur. Il est aussi chargé de gérer les dépendances entre les propriétés d'objets.
*Exemple:*

1.  Insertion d'une facture
2.  Les produits associés ont pour clé étrangère l'id de la facture
3.  Récupération de l'id de la facture depuis le retour de la requête
4.  Injection de l'id dans `$produit->setIdInvoice($id)`
5.  Gestion des transactions (commit ou rollback)
6.  Si commit: Mise à jour de la session

Dans cette exemple, vous avez envoyé votre objet facture avec 20 objets produit encapsulés

###### Methodes
`$database->create([$object])` <br>
`$database->update([$object])` <br>
`$database->delete([$object])` <br>
`$database->database('personalMethod', [$object])` <br>

Les trois premières méthodes appelleront la méthode `create, update ou delete` dans votre class Table, si vous souhaitez créer des méthodes supplémentaire ou simplement personnaliser le nom de vos méthodes, utilisez `$database->database(...)`. <br>
**Attention** Pour fonctionner correctement, DataManager à besoins de connaitre le type de methode appelé (create, update, delete), si vous personnalisez le nom de vos méthodes, DataManager ne pourra pas savoir de quel type de requête il s'agit et ne gérera pas l'encapsulation (comportement pas défaut), pour l'informer du type de requête créez un alias (voir annotations).



<br>
<br>
<br>

#### Annotations

*Controller:* 

`@Route{"choice/your/path"}` Défini la route pour ce controller


*Service:*

`@autowire` Informe le builder (lors du passage en production) qu'il doit ajouter cette class aux définitions du CI pour compilation (Utile lorsque les injections sont réalisées par annotations)
Non géré nativement par php-di.


*Entity:*

`@session{"$key"}` Clé de l'objet en session

`@session{"keyArray"}` La valeur de la propriété sera la valeur de la clé du tableau en session

exemple: `$_SESSION[$key][keyArray] = (mixed)$value`


`@database{"Namespace\To\Table"}` Table de l'entité

`@database{"personalMethod", "create|update|delete"}` Créer un alias pour une méthode personnalisé

`@database{"insert"}` Insertion de la valeur de **retour** de la requête

`@database{"depend", "Namespace\Object\Depend::getDependancy"}` Insertion **avant** la mise en base de donnée


Interdit à DataManager d'effectuer un traitement pour la méthode cible sur les objets encapsulé(valable quelque soit la profondeur)

`@database{"noUpdate"}`

`@database{"noCreate"}`

`@database{"noDelete"}`



`

 
