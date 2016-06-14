Acception
=========

Dockerized instant codeception testing


Requirements
------------

- `docker-compose` >= 1.7.0

Quick Start
-----------

Start the stack

    docker-compose up -d

Run the tests    
    
    docker-compose run --rm codecept run
    
See `tests/_output` for test results.    


Setup
-----

Configure base URL in `tests/acceptance.suite.yml`.

```
modules:
    config:
        WebDriver:
            url: http://my-domain.com/
```


Usage
-----

Add `Cept`s to `tests/acceptance`.


Resources
---------

- [Codeception](http://codeception.com)
- [docker-yii2-app](https://github.com/dmstr/docker-yii2-app) Example for unit & functional testing with Codeception Docker container

---

#### ![dmstr logo](http://t.phundament.com/dmstr-16-cropped.png) Built by [dmstr](http://diemeisterei.de)
