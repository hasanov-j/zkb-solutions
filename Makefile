##################################################
# 					Variabless
##################################################
DOCKER_COMPOSE = docker-compose -f docker-compose.yml

##################################################
# 				Docker compose
##################################################
init: down build up composer-install

build:
	${DOCKER_COMPOSE} build
down:
	${DOCKER_COMPOSE} down --remove-orphans
down-volumes:
	${DOCKER_COMPOSE} down --remove-orphans --volumes
up:
	${DOCKER_COMPOSE} up -d
restart:
	${DOCKER_COMPOSE} restart

##################################################
# 					App
##################################################
bash:
	${DOCKER_COMPOSE} run --rm zkb-solutions-app bash

composer-install:
	${DOCKER_COMPOSE} run --rm zkb-solutions-app composer install

composer-update:
	${DOCKER_COMPOSE} run --rm zkb-solutions-app composer update


