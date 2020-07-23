# ApplicationScope

No specific explication for this component, it's an variable with application scope.

Use 

`has(string $index): bool`

> For know if the component contains this key

`get(string $index)`

> For take the value associate to the index


`set(string $index, mixed $value, bool $reset = false)`

> For update or create the value associate to this index, if select is defined to true, 
> all data associate to this index will be deleted

`delete(string $index)`

> For delete this entry  
