# Weather CLI

This project is a simple assessment task for BookingKit company.

## Table of Contents

- [Assessment](#assessment)
- [Install](#install)
- [Usage](#usage)

## Assessment

Write a PHP-based command line app which prints the current weather of any city which you specify as argument. 

## Install

1. Download the project within the directory of your choice

```sh
$ git clone https://github.com/nidldev/weather_cli
```

2. Go to the project directory

```sh
$ cd ./weather_cli
```

3. Build the Docker image

```sh
$ docker build -t weather_cli .
```

4. Run the container

```sh
$ docker run -it --rm --name weather_cli weather_cli /bin/bash
```


## Usage

Now that you're running the container, you can run Weather CLI using:

```sh
$ ./weather Berlin
# Prints out the current weather description and temp for a given city (name or id)
``` 

or

```sh
$ ./weather 100
# Prints out the current weather description and temp for a given city (name or id)
```

### N.B

You could also use the line below to avoid the need of previously build an image and 
running several commands in a row.

```sh
$ docker container run --rm -v $(pwd):/app/ php:7.3-cli /app/weather Berlin
```

I did not choose to use docker-compose even though it would have made installation process much easier. 
It seemed a bit overkilled too me to use docker-compose for only one container. 