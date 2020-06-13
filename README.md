# Nomess

Nomess is compatible with Linux and Mac Os 

Install
> composer create-project nomess/nomess

*Librairie:*

*PHPUnit* <br>
*Twig* <br>
*php-ref*

Requierement: 
php7.4 
nomess/kernel
<br>
<br>

___
#### Introduction

Nomess is built on an MVC pattern, many components are developed to combine perfomance and fluidity in development process.
<br>
<br>

___
#### Tree

###### Application:


`App/src/Controllers` Contains your controllers

`App/src/Modules` Contains all modules of application

`App/src/Tables` Contains the classes of persistence (if the PersistsManager not used)

`App/config` Files of configuration

`App/var/*` Error log and files cached

###### Web

`Web/public/*` Contains your templates

`Web/cache` Twig cache

###### Tests

`Tests/Modules` Your testing class

`Tests/reports/*` Code coverage reports

`Tests/cov.sh` Generator of report global of code coverage

###### Root

`console.sh` Allow of purge cache, pass in development/production state, generate controllers ...

`install_server.sh` Create your script for install a basic server

<br>
<br>

___

# Details of source code application

#### Controllers

###### Header

Affix `@Route(sample/route)` annotations for define route 
and `@Filter(sample_filter_name)` for control the access

You can specify many routes or filters annotations

###### Methods:

* `doGet(HttpResponse, HttpRequest)` called in the context of the GET request
* `doPost(HttpResponse, HttpRequest)` called in the context of the POST request

###### Extends Distributor

> NoMess\Manager\Distributor

<br>

*`forward(?HttpRequest $request, ?HttpResponse $response, string $dataType = Distributor::DEFAULT_DATA): Distributor`*

*$request*: Attaches HttpRequest class to the response, will send parameters, error message and succes message defined

*$response*: Attaches HttpResponse class to response, will be execute pending operations (creation/modification of cookies )

*$dataType*: By default, the data will send in php format, specify JSON_DATA for convert data in json format

<br>

*`redirectLocal(string $url): Distributor`* 

> Redirects to a local resource, if the forward method is called, pending operations
will be executed and the data will be presented in the following context

*$url*: Specifies url to follow (sample: 'home')

<br>

*`redirectOutside(string $url): Distributor`* 

> Redirects to an external resource, if the forward method is called, pending operations
will be executed

<br>
 
*`bindTwig(string $template): Distributor`* 
 
> Binds the twig model engine to the response

<br>
 
*`bindDefaultEngine(string $template): Distributor`* 
 
> Binds a php file to the response

<br>
 
*`sendData(): ?array`* 
 
> Send data provided by forward method, useful coupled to json format 

<br>

*`bindForm(array $form): Distributor`*

> Bind one, or many form

<br>
 
*`stopProcess(): void`* 
 
> Kill the current process

<br>

___

#### Services

The services are not bound to respect a rule, but look at our philosophy:

The service should return a Boolean type, basically, false for the error and 
true for the success. Use the *NoMess\HttpRequest\HttpRequest* class to communicate with the outside world.

`HttpRequest::getParameter(string $index, bool $escape = true)` for get request parameter, apply an type and validate value received

`HttpRequest::setRender(string $serviceStamp, $value)` useful for return other value

`HttpRequest::setSuccess(string message)` for set an success message

`HttpRequest::setError(string $message)` for set an error message  

The persistence value should not be launch from the service, prefer the launching in the controllers 

<br>

___

#### Template

There are no specific practices, you can use the Twig engine or the php engine, whatever.

###### Get error and success message:

*With twig engine*

`{{ param.error }}` and `{{ param.success }}` 

*With php engine*

`$param['error']` and `$param['success']` 

###### Get other value

*With twig engine*

`{{ param.sample_index }}` 

*With php engine*

`$param['sample_index']`

###### Get POST or GET variable with twig

`{{ POST.sample_index }}` and `{{ GET.sample_index }}` 

###### Call resources

For call resource, start to `public/`, prefix your relative path by WEBROOT constant.

*Sample*

`{{ WEBROOT ~ 'css/stylesheet.css' }}`

`echo WEBROOT . 'css/stylesheet.css`


<br>

___

#### Entity

The entity must be respect the convention, the getters and setters must respected this format:<br> 
`setPropertySample` and `getPropertySample` 

If property is public, no accessor or mutator will be sought.

if you don't respect it, you cannot use a many components of nomess




<br>
<br>

___

# Components

Manage your components in 

> App/config/component.php

[Container](Doc/Container.md)

[DataManager](Doc/DataManager.md)

[PersistsManager](Doc/PersistsManager.md)

[HttpSession](Doc/HttpSession.md)

[LightPersists](Doc/LightPersists.md)

[Slug](Doc/Slug.md)

[ApplicationScope](Doc/ApplicationScope.md)


 
