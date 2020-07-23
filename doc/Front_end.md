#Front-End

###Template engine
Nomess have a good support for twig. And very bad for php engine

###### Get parameters

*With twig engine*

`{{ param_name }}`

> The parameters of HttpRequest is this:
> `{{ error : array }}`, `{{ success : array }}`, `{{ POST.index }}` and `{{ GET.index }}`

*With php engine*

`$param['index']`

> The parameters of HttpRequest is this:
> `$param['error']`, `$param['success']`, `$param['POST']` and `$param['GET']`


###Path

For call path, use

`{{ path('route.name', {"parameter": value}) }}`

###Form


Nomess offers a field constructor, but nothing inside the backend.

To get started, here are some methods that can be used implicitly (with the field constructor):

Both of these methods look in the POST and GET variables and in your * object for complete the value.

* This extension knows your parameters, but you must pass your object explicitly with: ` {{ form_bind (my_object) }} ` at the top of the form


`{{ form_value('input_name', 'property_name', 'default_value' ) }}`

> For all field except select

*input_name*: The name of your input, nomess will search in post et get variable

*property_name*: (optional) If the input name is different of property name, you can specify that

*default_value*: (optional) If nothing data is found, the default value will be apply

> The data of the post or get variable is prioritized over the object data

`{{ form_select('select_name', 'searched_value', '(array)repository', 'propertyName') }}`

> Only for select

*select_name*: The name of your selection, nomess will search in the variables post and get then in your object,
               if the value of your property is an object, the id will be searched, if it is an array it will be visited, and nomess will search
               the object with the correct identifier
               
*searched_value*: The value of option

*repository*: (optional) If you want nomess to search within defined values, provide it

*property_name*: (optional) If the select name is different of property name, you can specify that

#####Field

By default, the builder use bootstrap, you can enable or disable that with:

`{{ bootstrap(FALSE|TRUE) }}`

For all field, the last parameter (`value_extension` concerning the completed value ) can be accepte three type of data:

*null*: you let nomess completed for you

*array*: you help nomess for complete the value with: `['propertyname', 'default_value']` for classic field and `['(array)repository', 'propertyName']` for select (look above for more)

*false*: Nomess not auto complete

`{{ input(options: array, value_extension : null|array|false) }}`

> Default: `<input type="text" class="form-control" required="true">`

`{{ textarea(options: array, value_extension : null|array|false)`

> Default: `<textarea required="true"></textarea>`

`{{ select(options : array, data : array, value_extension : null|array|false) }}`

> Default: `<select class="customer-select" required="true">`

*data*: an associated array with `['value_option' => 'text_option']`, if you must build your option by array object, you can use:

`{{ compose(data : object|array|null, structure_options : array, guide_to_visit : array) }}`

> This method is powerful so well understood

*data*: A object or an array of objects to decomposed

*structure_options*: It is an associated array with only one row, the key will be the value of the option and the value will be the text of the option, example:

`class Client {private $id; private $first_name; private $last_name}`

`{{ compose(client, {"prop(id)": "prop(last_name) prop(first_name)"}) }}` <br>

Or

`{{ compose(client, {"form_prop(id)": "Her last name is prop(last_name) and her first name is prop(first_name)"}) }}` <br>

*guid_to_visit*: You have an array of client containing an array of invoice containing an array of product, represented by:

`class Entity\Client {private array $invoices}` <br>
`class Entity\Invoice {private array $products}` <br>
`class Entity\Product {private $id; private $name; private $price}`

You want this structure for options: `<option value="id_of_product">The product costs (price_of_product) and her name is (name_of_product)</option>`

`{{ compose(clients, {'prop(id)': 'The product costs prop(price) and her name is prop(name)'}, {'Entity\\Client': 'invoices', 'Entity\\Invoice': 'products'}) }}`


For a label, specify only text, the "for" attribute for a label and "id" for a field will be automatically added:

`{{ label(options : array) }}`

> {{ label({'value': 'My label') }}

You must add a label before the field, if it is a checkbox, or a radio, it will be automatically placed after

###Csrf

For have an input with the token:

`{{ csrf('POST') }}`

For have only token

`{{ csrf('GET') }}`

If you precise the token in path, the parameter must be:

> _token


###Resources

For call resources (css/js etc):

> /css/styles.css

and add your css in `public/css/styles.css`

###Add an extension to twig

Add your class of extension in:

> config/components/twig.php
