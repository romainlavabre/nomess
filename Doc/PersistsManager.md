# PersistsManager

The PersistsManager exempt you from creating a class of persistsence,
but you keep control on your SQL request.

In background, the PersistsManager will build an class of persistsence, 
and make an cache file for optimize the performance.


<br>

___

#### Configurations

> App/config/component/PersistsManager.pgp

<br>

`Sample\Object\Name::class => [` // Concerned object <br>
    &nbsp;&nbsp;&nbsp;&nbsp;`'id_config_database' => 'default',`// Identifiant of configuration for database connection <br>
    &nbsp;&nbsp;&nbsp;&nbsp;`'read' => [` // Method name<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`'id_config_database' => 'optionnal_remove_if_not_use',` // Overload of database configuration<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`'request' => 'Select_request',`// Request <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`'patch' => [` // Patch if necessary (you will guide by PersistsManager)<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`//Optionnal`<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`]`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`],`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`'create' => [`<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`'request' => 'Create_request'`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`],`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`'update' => [`<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`'request' => 'Update_request'`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`],`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`'delete' => [`<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`'request' => 'Delete_request'`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`],`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`'other_request' => [`<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`'request' => 'request'`<br>
    &nbsp;&nbsp;&nbsp;&nbsp;`]`<br>
`],`<br>


##### Annotations

`@PM\Table(db_table)`

> It's an annotation class for mapping your table in database

`@PM\Column(name_column)`

> For mapping an column

`@PM\Dependency`

> Precise that the property it's an dependency (other entity)

`@PM\Dependency(Full\Name\Of\Dependency)`

> if you cannot explicitly specify the dependency type, use that

`@PM\Patch\ ~`

> You will guide by PersistsManager

`PM\Extends(property_name,column_name)`

> In case of heritage and if column is not identical, specify it in class comments


<br>

___

#### Method

*`read(string $fullNameClass, ?array $parameter = null, string $idMethod = 'read'): void`*

`$fullNameClass` Name of target class to read (key in array configuration)

`$parameter` For select request, the parameter resolver is not supported, you must 
explicitly specified it<br>
<br>
<ins>Format</ins>

`[ 'parameter' => mixed $value]`

<br>

`$idMethod` The id method to call (look your config file), default is "read"

<br>

*`create(object $object, ?array $parameter = null, string $idMethod = 'create'): void`*<br>
*`update(object $object, ?array $parameter = null, string $idMethod = 'update'): void`*<br>
*`delete(object $object, ?array $parameter = null, string $idMethod = 'delete'): void`*


`$object` The object to persists

`$parameter` If the parameters is contains in current $object, you can ignore, else, precise the paramters

`$idMethod` The id method to call (look your config file), default is "create|update|delete"


#### Couple PersistsManager to DataManager

> NoMess\Component\DataManager\Database


For couple this components, use:

`Database::buildPM(?string $className = null, ?array $parameter = null, ?string $idMethod = null): Database`

If you need of precise an parameter or the identifiant of method, complete parameters, else, ignore

*Sample:*

`$database->create([$myObject])->buildPM()`<br>
`$database->create([$myObject])->buildPm(My\Class\Name::class, ['user_id' => 57], 'myMethodName')`<br>

If your class have dependency<br>
`$database->create([$myObject])`<br>
`->buildPm(My\Class\Name::class, ['user_id' => 57], 'myMethodName')`<br>
`->buildPm(My\Dependency::class, ['user_id' => 57], 'myMethodName')`<br>

