DK = docker
DC = docker-compose
EXEC = exec -it slim-api

init: build start chown

start:
	${DC} up -d

stop:
	${DC} down -v --remove-orphans

restart:
	${DC} restart

build:
	COMPOSE_DOCKER_CLI_BUILD=1 DOCKER_BUILDKIT=1 ${DC} build

composer-install:
	${DK} ${EXEC} composer install

chown:
	${DK} ${EXEC} chown -R www-data:www-data storage

bash:
	${DK} ${EXEC} bash

# To accept additional parameter to phpunit. Usage: make test-units -- --phpunitParam the-value-to-param
commands_with_params := tests
ifneq ($(filter $(firstword $(MAKECMDGOALS)), $(commands_with_params)),)
  runargs := $(wordlist 2, $(words $(MAKECMDGOALS)), $(MAKECMDGOALS))
	runargs := $(if $(runargs), $(runargs),)
endif

tests:
	${DK} ${EXEC} /bin/bash -c 'vendor/phpunit/phpunit/phpunit$(runargs)'
