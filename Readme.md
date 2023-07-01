## Contact Page for Develery
This repository contains a contact page for job application purposes, developed for Develery.
It is built using PHP 8.2 and Symfony 6.3 framework.
Docker is used for containerization, Jenkins for continuous integration, and MariaDB 10.11 for the database.

## Overview
- [Structure](#structure)
- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
   - [Local development](#local-development)
   - [Development in docker](#development-in-docker)
- [CI/CD with Jenkins](#cicd-with-jenkins)
- [Database Configuration](#database-configuration)
- [Contact](#contact)

___
### Structure

~~~
├── bin
│    ├── console
│    └── phpunit
├── composer.json
├── composer.lock
├── config
│   ├── bundles.php
│   ├── packages
│   ├── preload.php
│   ├── routes
│   ├── routes.yaml
│   └── services.yaml
├── docker
│   ├── nginx
│   │   └── default.conf
│   └── php
│       ├── Dockerfile
│       └── start.sh
├── docker-compose.override.yml
├── docker-compose.yml
├── .docker.env
├── .env.dist
├── .env.test
├── Jenkinsfile
├── migrations
│   └── Version20230628094535.php
├── package.json
├── package-lock.json
├── phpunit.xml.dist
├── public
│   ├── assets
│   └── index.php
├── src
│   ├── Controller
│   ├── Entity
│   ├── Form
│   ├── Kernel.php
│   └── Repository
├── symfony.lock
├── templates
│   ├── base.html.twig
│   └── customer
├── tests
│   └── bootstrap.php
├── translations
├── var
│   ├── cache
│   └── log
└── vendor
~~~

___
### Prerequisites
Make sure you have the following software installed on your development environment:

- PHP 8.2
- Symfony 6.3
- Docker (optional)

___
### Getting Started

#### Local development
1. Clone the repository

   ```git clone https://github.com/Rea888/contact_page.git```
2. Install dependencies

   ```composer install```
3. Update the .env file with your database connection details, such as the host, database name, username, and password.

#### Development in docker
1. Clone the repository

   ```git clone https://github.com/Rea888/contact_page.git```
2. Update the .docker.env file

3. Run docker compose

   ```docker-compose up --build```

___
### CI/CD with Jenkins

This project includes a Jenkinsfile that defines a pipeline for continuous integration and deployment.
Jenkins should be set up to trigger the pipeline on each commit to the master branch.
The pipeline includes steps to build the project, and deploy the application.

___
### Database Configuration
The project uses MariaDB 10.11 as the database.
Ensure that you have a running instance of MariaDB and update the .env file with the appropriate database connection details.

___
### Contact
For any inquiries or questions regarding this job application contact page, please contact me at info@viktoriarakhely.eu.