#Filter


Filters allow control over controllers, your filters intercept URLs, if they match, the Filtrate method is called. You can use dependency injection inside.

To generate a filter:


> ./console.sh: filter -c


It will be affixed by `@Filter("your_regex_here")`, complete it to intercept the correct uri

