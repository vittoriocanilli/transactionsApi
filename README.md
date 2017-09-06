# Transactions API

Here is a restful API which allows to insert transactions and to get statistics about all transactions of the last 60 seconds.

## Technologies
For the application I have chosen to use PHP and Memcached, because I am more familiar with these technologies.
To manage and install the PHP packages I have used Composer, which helped me to configure the autoloader as well.
To run the unit tests, I have decided to PHPUnit.
Eventually I needed just to install a couple of third party libraries:
* PHPUnit: obviously for unit testing
* GuzzleHTTP: specifically to unit test HTTP requests and responses in PHPUnit

## Structure
I have used a structure for my solution to keep the classes and files together according to their functionalities:
* application: application's core
    * app: application's main functions and logic
        * classes: managing requests to and responses from the RESTful API
        * factories: managing the creation of suitable classes
        * models: managing data from and to the memcached
    * public: files managing external requests to the API
    * tests: unit tests for PHPUnit
    * vendor: PHP packages and libraries (it will be created by PHP Composer)
* build: configuration files for Docker

## Setup instructions
To run this restful API locally you will need to have Docker installed in your machine.
After you have installed it, you can now install the necessary PHP packages with Composer by creating a temporary Docker image: you will need then to execute the following command in the directory where the composer.json file is located (application directory):
* docker run --rm -v $(pwd):/app composer/composer:latest install
Now that the dependencies are available in the new application/vendor folder, you should access the directory where the docker-compose.yml file is located and run the following command to set up the Docker container for the Transactions API:
* docker-compose up -d

## Unit tests
In case you need to execute the PHPUnit tests you will need to go through the following steps:
* get your PHP's Docker image ID or name
    * docker ps
* ssh to your PHP's Docker image by using its ID or name
    * docker exec -it PHP_DOCKER_ID_OR_NAME sh
* execute the various tests with PHPUnit from the application's directory
    * cd /var/www/html && vendor/bin/phpunit
Please note that you have to ssh to your PHP's Docker image and not to the Nginx's or Memcached's ones.