# Transactions API

Here is a restful API which allows to insert transactions and to get statistics about all transactions of the last 60 seconds.

## Setup instructions
To run this restful API locally you will need to have Docker installed in your machine.

After you have installed it, you can now install the necessary PHP packages with Composer by creating a temporary Docker image: you will need then to execute the following command in the directory where the composer.json file is located (application directory):
- docker run --rm -v $(pwd):/app composer/composer:latest install

Now that the dependencies are available in the new application/vendor folder, you should access the directory where the docker-compose.yml file is located and run the following command to set up the Docker container for the Transactions API:
- docker-compose up -d