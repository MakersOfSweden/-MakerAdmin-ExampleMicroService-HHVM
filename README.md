PHP based reference module for MakerAdmin
=========================================
This is a PHP micro service reference implementation for MakerAdmin. It will spawn a service and connect it to the MakerAdmin system via the ApiGateway.

It is based on the following software:

 * HHVM
 * Lumen
 * Docker


Installation
------------
You should use the files from this repository as a boilerplate to create your own modules for MakerAdmin

# Requirements
* A working MySQL server (If you are going to use a database)
* A working API Gateway for MakerAdmin

# Step 1: Download the source code from GitHub
```
git clone https://github.com/MakersOfSweden/MakerAdmin-ExampleMicroService-HHVM
cd ./MakerAdmin-ExampleMicroService-HHVM/docker/
```

# Step 2: Set a name for your module
Change the file `./docker/config` and put the name of your module

# Step 3: Create a database on your database server (If you are going to use a database)
Create a new database and user in your MySQL database server.

```
CREATE USER `makeradmin-yourmodule`@'%' IDENTIFIED BY 'password';
CREATE DATABASE `makeradmin-yourmodule`;
GRANT ALL ON `makeradmin-yourmodule`.* TO `makeradmin-yourmodule`@'%';
FLUSH PRIVILEGES;
```

# Step 4: Build docker container
The following script will build a new docker container and tag it with the correct name and version.
```
./docker/docker_build
```

# Step 5: Start docker container
You can now start an instance of the module and register it in the MakerAdmin system. Make sure you have the database credentials specified in step 3.

Note: If you are running this module as a part of a bigger system, then you should probably use a docker-compose.yml file instead. More information about this will be added later.

Run the following script to start the container. The last parameter should be the address to the API gateway. Keep in mind that if you use the name of the container as the hostname, this module and the ApiGateway needs to be on the same network.
```
./docker/docker_run mysql makeradmin-yourmodule password makeradmin-yourmodule makeradmin-apigateway
```

# Step 6: Create database tables
To create the database table you have to run the migration scripts. (You probably don't have any database tables at this time. This command needs to be run after your database migration scripts are added to Lumen)
```
./docker/artisan migrate
```

# Step 7: Test the service
The service should now be up and running and should be possible to access from the API.


Todo
----
 * Should composer really be installed? Maybe it should depend on a production/development flag?
 * We should import all Lumen files and common PHP files as well