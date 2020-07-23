# Controller 

###### Extends Distributor

> NoMess\Manager\Distributor

<br>

*`forward(?HttpRequest $request, ?HttpResponse $response, string $dataType = Distributor::DEFAULT_DATA): Distributor`*

*$request*: Attaches HttpRequest class to the response, will send parameters, error message and succes message defined

*$response*: Attaches HttpResponse class to response, will be execute pending operations (creation/modification of cookies )

*$dataType*: By default, the data will send in php format, specify JSON_DATA for convert data in json format

<br>

*`redirectLocal(string $url, ?array $parameters): Distributor`* 

> Redirects to a local resource, if the forward method is called, pending operations
will be executed and the data will be presented in the following context

*$url*: Specifies url to follow (sample: 'route.name')

*$parameters*: Specifie the parameters of request

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
 
*`stopProcess(): void`* 
 
> Kill the current process


#### Define a route

Affix `@Route("/sample/route")` annotations for define a global route

If you have specified a global route, your routes will be affixed by that.

For methods, use:

`@Route("/path/of/route/{id}", name="name.of.route", methods="POST,GET", requirements=["id" => "[0-9]+"])`

The parameters "name", "methods" and "requirements" is optional.
You can find your parameter with: `HttpRequest::getParameter('id')`

#### Generate an controller


You can use console.sh and `controller -c` for generate a controller 
