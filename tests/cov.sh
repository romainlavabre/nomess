#!/bin/bash

../vendor/bin/phpunit Modules --coverage-html reports/FullTest

echo 'Retrouvez votre rapport dans reports/FullTest/index.html'

