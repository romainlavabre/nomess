#!/bin/bash

echo 'Requier phpcov'


read -p 'Saisissez le dossier rassamblant les rapports (depuis Tests/...): ' dirReport

rm reports/fullTest.cov 

vendor/bin/phpunit $dirReport --coverage-php reports/fullTest.cov

vendor/bin/phpcov merge --html reports/FullTest reports/

echo 'Retrouvez votre rapport dans reports/FullTest/index.html ou dans la toolbar -> phpunit'

