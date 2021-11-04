# laravel_subscription_management
Implementation of an API application using the Laravel Framework [https://laravel.com/docs/8.x](https://laravel.com/docs/8.x)

### Installation
- Clone the project
- In the project folder run `make all` or run the docker commands in Makefile
- Hit the IP address with postman
- if the database not loads, the database file is under ./docker/mysql/laravel.sql

### Requirements
- docker
- docker-compose
- make

### without docker
- php
- composer
- mysql or mariadb would be fine

### Usage
- You may use the the postman collection file that inside the main directory of the project
- The base will be `http://localhost:8081`

### About:
- In this project, I use PHP version 8 and laravel framework version 8.
- As a database engine I prefer to use MyISAM, because the engine is faster with add, update, delete operations, so I thought it would be better.
- In the base controller I max the max_execution_time to make sure the project works fine under load.
- 

#### Requests
The routes available are for the api part:

| Method | Route                                                    | Parameters                                      | Action                                                   |
|--------|--------------------|-------------------------------------------------|------------------------------------------------------------------------------------------------|
| `GET`  | `/api/register`                                         | No parameter needed                              | Gives report over databases                                      |
| `POST`  | `/api/register`                                         | uid, appId, language, device_os                              | This api registers device to database device_os parameter taken via header by the variable `User-Agent`                                      |
| `POST`  | `/api/purchase`                          | client-token, receipt-hash                                      | This api checks the receipt-hash with the device type, via platformAPIMock and saves the data to database                 |


The routes available are for the worker part:

| Method | Route                                                    | Parameters                                      | Action                                                   |
|--------|--------------------|-------------------------------------------------|------------------------------------------------------------------------------------------------|
| `GET`  | `/update-expired-dates`                                         |  No parameter needed                                    | Updates the expired but not canceled records                                      |