# Behat

Just a bit BDD with Behat.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them

```
docker + docker-compose
```

### Installing

```
git clone git@github.com:fzberlin23/behat.git .
Modify docker-compose.yml and set the "volumes" path appropriately
docker-compose up -d
docker exec -it behat bash
composer install
```

### Installing behat from scratch

```
composer require --dev behat/behat
composer require --dev phpunit/phpunit
composer require --dev behat/mink-extension
composer require --dev behat/mink-goutte-driver
composer require --dev behat/mink-selenium2-driver
composer require --dev se/selenium-server-standalone
```
