# RewriteUrl

The RewriteUrl permit of create dynamically rule during execution

#### Method

*`createRule(callable $search, ?string $rewrite, string $id) : void`*

> Add an rewrite rule

`$search` searched

`$rewrite` Rewriten

`$id` unique id

*`unsetRule(string $id) : bool`*

> Delete an rewrite rule