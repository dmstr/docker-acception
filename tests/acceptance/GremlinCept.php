<?php

// @group optional
// inspired by https://github.com/marmelab/gremlins.js

$I = new AcceptanceTester($scenario);
$I->wantTo('Click random links');

$I->amGoingTo('start on the home page');
$url = '/';
$I->amOnPage($url);

#$I->login('admin', 'admin1');

for ($c = 0; $c < 20; $c++) {

    $elements = $I->findElements('*:not([target="_blank"]):not([href^="http"])');
    $rand = array_rand($elements);
    $e = $elements[$rand];

    try {
        $I->scrollTo(
            'BODY',
            $e->getLocationOnScreenOnceScrolledIntoView()->getX(),
            $e->getLocationOnScreenOnceScrolledIntoView()->getY()
        );
        #$I->wait(1);

        $I->amGoingTo('click '.$e->getAttribute('href'));
        $e->click();
    } catch (Exception $e) {
        $I->comment($e->getMessage());
    }

    $I->waitForElementVisible('BODY');

    # TODO - return value not working
    if ($I->cantSeeElementInDOM('.site-error')) {
        // debug screenshot
        $I->makeScreenshot("gremlin-{$c}");
    }

}