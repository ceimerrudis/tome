#!/bin/bash
docker build -t tome:latest .
docker run -d \ --name tome \  -p 8080:80 \  -v "/tome:/var/www/html/data" \ tome

