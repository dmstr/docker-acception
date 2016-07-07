<?php

$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that home page works');
$I->amOnPage('/');
$I->seeElement('body');
$I->makeScreenshot('success-home');
