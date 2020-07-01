# EntityManager

> Nomess\Components\EntityManagerInterfcae


The entity manager works with RedBean php, an abstraction layer is provided 
to convert your object to a bean and vice versa.

No configuration is necessary, start creating your application, that's it.
In the context of production, the database is frozen.
The redbeanphp uses strict conventions, read its [documentation](https://www.redbeanphp.com/index.php) for more.

ReadBeanPhp provides a reasoned abstraction. The Sql was never far from you.

Methodes of entity manager:

`find(classname : string, idOrSql : int|string, parameters : array)`

classname: Name of your object

idOrSql: Id of your object or a where clause in SQL language

parameters: If secondary parameter is an SQL where clause
