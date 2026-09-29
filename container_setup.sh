#!/bin/bash

set -e
php /var/www/tome/db_startup.php
exec apache2-foreground
