# Container


The dependency injection container is integrated by default in nomess and works on the principle of autowirering.
> NoMess\Container\Container

<br>

`@Inject` Annotation can be used for all methods and properties of your class

*Sample:*

`/**`<br>
` * @Inject` <br>
`**/` <br>
` private DependencyType $myDependency`

`/**`<br>
` * @Inject` <br>
`**/` <br>
`private function myFunction(Dependency1 $dependency1, Dependency2 $dependency2){}`

The properties or parameters must be always typed, the container don't consider the annotation `@var`

<br>

*`get(string $className): object`*

> Return the autowired object

By default, if an instance already exists, this same instance will be returned, if you want new instance, call:

<br>

*`make(string $className): object`*

> Return new instance of the object target 


#### Interfaces

For manage your interfaces, you use 
> App/config/defintions.php

`My\Interface::class => ['get' => My\Class::class]` 

or

`My\Interface::class => ['make' => My\Class::class]`

