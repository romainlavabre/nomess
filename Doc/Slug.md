# Slug

The slug component automatically resolves your slug, so, if your slug is found, the value of parameter will be converted.

To use this component, call this

`$entity->generateSlug('article' . $entity->getTitle)`

> You must ensure that your slug is unique