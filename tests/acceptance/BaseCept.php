<?php

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that Pages works');
$I->amOnPage('/');
$I->see('Example Domain');
$I->makeScreenshot('success-pages-index');
