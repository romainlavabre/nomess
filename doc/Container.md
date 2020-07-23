# Container


The dependency injection container is integrated by default in nomess and works on the principle of autowirering.
> NoMess\Container\ContainerInterface

<br>

`@Inject` Annotation can be used for all methods and properties 
of your class, but she's optional for the constructors and controller's method.



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
except in certain cases:<br>
If you have an array of objects that implement an interface, your property or parameter 
will be typed with `array` and a var annotation will carry your interface

<br>

*`get(string $className): object`*

> Return the autowired object

By default, if an instance already exists, this same instance will be returned, if you want new instance, call:

<br>

*`make(string $className): object`*

> Return new instance of the object target 


#### Interfaces

For manage your interfaces, you use 
> config/container.php


If there is only one class that implements it: <br>
`My\Interface::class => My\Class::class` 

If multiple class implement it:<br>
`My\Interface::class => [My\Class::class, My\Second\Class::class]`

If multiple class implement it but you want only once class:<br>
`My\Interface::class => ['var_name' => My\Class::class, 'var_name' => My\Second\Class::class]`

If var name doesn't match, all classes of the table will be injected

