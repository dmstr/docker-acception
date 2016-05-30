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
    
See `_output` for test results.    


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