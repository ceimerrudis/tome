#!/bin/bash
cd /tome/dynamic/tome

docker stop "tome" 2>/dev/null || true
docker rm "tome" 2>/dev/null || true

docker build -t tome:latest .
docker run -d --name tome -p443:443 -p 80:80 -v "/tome/persistent:/var/www/html/data" tome

