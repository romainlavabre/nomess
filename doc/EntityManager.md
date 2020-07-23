# EntityManager

> Nomess\Components\EntityManagerInterfcae


The entity manager works with RedBean php, an abstraction layer is provided 
to convert your object to a bean and vice versa.

No configuration is necessary, start creating your application, that's it.
In the context of production, the database is frozen.
The redbeanphp uses strict conventions, read its [documentation](https://www.redbeanphp.com/index.php) for more.

ReadBeanPhp provides a reasoned abstraction. The Sql was never far from you.

Methodes of entity manager:

`find(classname : string, idOrSql : int|string, parameters : array, lock = false : bool)`

*classname*: Name of your object

*idOrSql*: Id of your object or a where clause in SQL language

*parameters*: If secondary parameter is an SQL where clause

`persists(object : object)`

`delete(object : object)`


###Cache
An cache of entities is available in nomess, you can enable it in:

> config/components/EntityManager.php

*enable*: FALSE (default)

*life_time*: 60 * 60 * 6 (default)

And add your entity to cache:

`Name\Of\Entity\1::class => true,`<br>
`Name\Of\Entity\2::class => true,`

For purged cache:

> ./console.sh: cache -e
