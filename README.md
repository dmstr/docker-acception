Acception
=========

Dockerized instant acceptance testing for any website with Codeception


Requirements
------------

- `docker-compose` >= 1.7.0

Quick Start
-----------

Run the tests    
    
    docker-compose run --rm codecept run -d acceptance example
    
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

Enter the tester container and open VNC connections Firefox and Chrome

    make open-vnc bash

Create `Cept`s to `tests/acceptance/project`.

    $ codecept generate:cept acceptance project/Products
    
Edit the newly generated file, ie.

    $I->amOnPage('products.php');
    $I->see('Products', 'h1');

And run the tests

    $ codecept run acceptance project
   
For more information how to use Codeception, run `codecept --help` or visit their [documentation](http://codeception.com/docs/).
   

### Tips & tricks

- [`$I->pauseExecution`](http://codeception.com/docs/modules/WebDriver#pauseExecution) is very helpful in debug modde
- There are a lot of [extensions/modules](http://codeception.com/addons) available for Codeception   


Resources
---------

- :green_book: [Documentation](./docs/README.md)
- :black_circle: [`dmstr/docker-acception`](https://github.com/dmstr/docker-acception)
- :white_circle: [`dmstr/docker-yii2-app`](https://github.com/dmstr/docker-yii2-app) Example for unit & functional testing with Codeception Docker container
- :cd: [Codeception](http://codeception.com)

---

#### ![dmstr logo](http://t.phundament.com/dmstr-16-cropped.png) Built by [dmstr](http://diemeisterei.de)
