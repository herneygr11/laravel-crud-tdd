<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/RuizHerney">
    <img src="https://raw.githubusercontent.com/RuizHerney/img-repositories/master/19_06_2020_laravel-crud-tdd/laravel-crud-tdd.png?token=AMK6KQ3LDXSVAY2Z4FL5I4C65VAXS" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">LARAVEL CRUD TDD</h3>

<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
  * [Run Project](#run-project)
* [Tests](#tests)
  * [Integration run test](#integration-run-test)
  * [Browser run test](#browser-run-test)
* [Contact](#contact)



<!-- ABOUT THE PROJECT -->
## About The Project

Example of a raw with TDD to show the advantages of refactoring when applying tdd in our development, this project will gradually scale to show these advantages.

With TDD:
* Development with quality and you keep improving.

### Built With

* [Laravel](https://laravel.com)
* [Bootstrap](https://getbootstrap.com)




<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

* php ^7.4.2
* composer ^1.10.7
* node ^12.16.3
* npm ^6.14.4

### Installation

1. Clone the repo
```sh
git clone https://github.com/RuizHerney/laravel-crud-tdd.git
```

2. Install Composer packages
```sh
composer install
```

3. Install Npm packages
```sh
npm install
```

### Run Project

1. copy the environment variable file
```sh
cp .env.example .env
php artisan key:generate
```

2. run server local
```sh
php artisan serve
```

## Tests
TDD is the idea that, before you write any code, you write a test that acts as a specification for exactly what that code is supposed to do.

### Integration run test

```sh
php artisan test
```

### Browser run test

```sh
php artisan dusk
```
<!-- CONTACT -->
## Contact

Herney Ruiz - herneyruiz36@gmail.com

---
[HerneyRuiz](https://github.com/RuizHerney) with ❤️