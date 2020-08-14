#!/bin/bash

../vendor/bin/phpunit Modules/$1Test.php --coverage-html reports/reports --no-coverage
