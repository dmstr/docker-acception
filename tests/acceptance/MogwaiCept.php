<?php

// @group optional
// inspired by https://github.com/marmelab/gremlins.js

$I = new AcceptanceTester($scenario);
$I->wantTo('Click random links');

$I->amGoingTo('start on the home page');
$url = '/';
$I->amOnPage($url);
$I->wait(1);

for ($c = 0; $c < 25; $c++) {

    $links = $I->grabMultiple('a[href^="/"]', 'href');

    // start-over on dead-end
    if (empty($links)) {
        $I->amOnPage('/');
        $I->wait(1);
    } else {

        // debug output
        //var_dump($links);

        $link = array_rand($links);
        $url = $links[$link];

        $I->amGoingTo('check '.$url);
        $I->amOnUrl($url);
        $I->wait(1);
        $I->cantSeeElementInDOM('.site-error');

        // debug screenshot
        #$I->makeScreenshot("gremlin-{$c}");
    }
}