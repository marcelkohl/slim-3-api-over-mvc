# slim-3-api-over-mvc
Slim 3 API over MVC pattern

This project implements an API over MVC design pattern.
One sample model is implemented with the respectives classes for accessing database (DTO) and services.

## Running
Setup the .env file for the needed database connections

Make sure that docker and docker-compose are installed.

`make init` will build and bring up the environment.

`make tests` can show if everything is working as expected.

## Using
Access the sample endpoint using `localhost:18080/v1/sample`
