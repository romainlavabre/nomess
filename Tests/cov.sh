#!/bin/bash

echo 'Requiere phpcov'


if [ -f $dirReport/fullTest.cov ]
then
    rm $dirReport/fullTest.cov 
fi

../vendor/bin/phpunit Modules --coverage-php reports/fullTest.cov

../vendor/bin/phpcov merge --html reports/FullTest reports/

echo 'Retrouvez votre rapport dans reports/FullTest/index.html ou dans la toolbar -> phpunit'

