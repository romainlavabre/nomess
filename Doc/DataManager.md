# DataManager

> NoMess\Component\DataManager\Database

The DataManager manage your application data, so:

- Your session
- Your transaction


For the classes, its dependencies, the wrapped entities and values​returned by transactions are supported.
The DataManager will apply to wrapped entity the same treatment that for target entity.

To ensure data consistency, the DataManager uses the PDO transaction system.

You can create your class of persistence or use the [PersistsManager](PersistsManager.md), we will 
imagine that you have created your class of persistence for this document.

<br>

#### Method

`create(array $param, string $type = null): Database`<br>
`update(array $param, string $type = null): Database`<br>
`delete(array $param, string $type = null): Database`

> They permitted to add in pending operations your transaction, valid if you method in your peristence class have for name create/update/delete

<br>

*`$param`:* Object Array, by default, target is the first object found by DataManager in the parameters,
If, for some reason, you can't optimize postion of object in the parameters, you can explicitly specify the type
that DataManager should search. (see $type option for more).

*`$type`:* if you can't fulfill a condition of $param, specify an object type that DataManager should search.

<br>

*Sample:*

`$database->create([$myObject]);`

> DataManager understand that you want create '$myObject', he add in pending operations

`$database->create([$myObject1, $myObject2, $myObject3], Entity\To\Create\MyObject2::class);`

> DataManager understand that you want create '$myObject2' with parameter '$myObject1' and '$myObject2', he add in pending operations

<br>
<br>

*`aliasMethod(string $method, array $param, string $type = null): Database`*

> It's identical, to create/update/delete, but precise the method name with `$method` 
> parameter. See the `@database{"personalMethod", "create|update|delete"}`

<br>

*`manage(): bool`*

> Execute the pending operations

<br>

*`setDatabaseConfiguration(string $idConfigurationDatabase): void`*

> By default, the "default" configuration will be called, if must change of configuration, call this method and precise 
> the good id configuration.<br>
> The file for manage your configurations is `App/config/database.php`

 

<br>

#### Configurations

DataManager support two type of configuration, by annotations inside entity and an configuration during execution.

##### Annotations

###### Database

`@database{"My\Table\Of\Persistence"}`

> It's an annotation class for mapping your class of persistence

<br>

`@database{"personalMethod", "create|update|delete"}`

> It's an annotation class for mapping the other method that name isn't identical to create/update/delete

<br>

`@database{"insert"}`

> This directive specify to DataManager that he must insert the values returned by transaction in this property.
> You can have only once insert directive by class

<br>

`@database{"depend", "My\Other\Entity::methodToCall"}`

> Specify to DataManager that he must take value of this mapped entity and insert insert in this property **before** the 
> transaction, the target entity will be search in group have already been treat.

<br>

`@database{"noCreate|noUpdate|noDelete"}`

> By default, the DataManager will try of persists all entity, same the wrapped, with this directive, you specify that 
> this entity will be never create/update/delete, the DataManager must know the type of transaction 

<br>

###### Session
  
`@session{"Key_in_session_array"}`

> It's an class annotation for mappe the session entry

<br>

`@session{"KeyArray"}`

> Precise to the DataManager that this property is the key of array in session


*Sample:*

`S_SESSION[Key_in_session_array][keyArray] = $myObject`

##### Execution 

*`setDependency(array $dependency): Database`*

> By deflaut, the dependance of target object will search in object group that has incur a treatment only in the current request.<br>
> If a object of identical type exists in group, only first will be keep.<br>
> For modified this behaviour, you should pass by reference the dependency of target object.

*`$dependency`:* `[$dendency1, $dendency2]` The DataManager will resolve the dependency 

You can add an key to help the reading of code

<br>

*`setInsertConfiguration(array $configuration): Database`*

> Modify the insert configuration<br>
> - Insert:<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - false : Insertion disabled<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - nomess_backTransaction : The inserted value is returned by transaction<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - Mixded value : All arbitrary value, if is an array, DataManager will attempt insertion as a block, then if an error has occured it will iterate your array<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - Array object : This parameter is an extention of full name of class, because, the data taken is defer, but it more, you can pass an array data for unique setter method, consequently, you must pass an reference of object dependency if you need defer method and pass an array data, this is option is good choice<br>
> Format: [setterMethod => value ]

<br>

*`setDependConfiguration(array $configuration): Database`*

> Modify the depend configuration
> - Depend:<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - false : disable an dependency<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - Full\Quanlified\class::methodName : Use specified class::method to inject value<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - Mixed value : All arbitrary value, if is an array, DataManager will attempt insertion as a block, then if an error has occured it will iterate your array<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - Array object : This parameter is an extention of full name of class, because, the data taken is defer, but it more, you can pass an array data for unique setter method, consequently, you must pass an reference of object dependency if you need defer method and pass an array data, this is option is good choice<br>
> Format: [ setterMethod => value ]

<br>

*`setTransactionConfiguration(array $configuration): Database`*

> Modify the transaction configuration
> - Transaction:<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - false : Disables an transaction for this encapsed object<br>
> &nbsp;&nbsp;&nbsp;&nbsp; - true : Enables an transaction for this encapsed object<br>
> Format: [ className => true|false ]




*Sample:*

`$database->create([$myObject])`<br>
&nbsp;&nbsp;&nbsp;&nbsp;`->setDependency(['description' => $dependency])`<br>
&nbsp;&nbsp;&nbsp;&nbsp;`->setInsertConfiguration(['setId' => 'nomess_back_transaction', 'setOtherProperty' => 'nomess_back_transaction'])`<br>
&nbsp;&nbsp;&nbsp;&nbsp;`->setTransactionConfiguration([No\Create\Entity::class => false, Create\Entity::class => true])`<br>
