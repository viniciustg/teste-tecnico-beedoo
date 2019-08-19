#!/bin/bash

cd /var/www/beedoo

a2enmod headers
a2enmod rewrite
service apache2 restart

/bin/bash