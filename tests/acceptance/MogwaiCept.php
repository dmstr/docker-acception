<?php

// @group optional
// inspired by https://github.com/marmelab/gremlins.js

$I = new AcceptanceTester($scenario);
$I->wantTo('Click random links');

$I->amGoingTo('start on the home page');
$url = '/';
$I->amOnPage($url);
$I->wait(1);

for ($c = 0; $c < getenv('TEST_MOGWAI_LIMIT')?:5; $c++) {

    $links = $I->grabMultiple('a[href^="/"]', 'href');

    if (empty($links)) {

        // start-over on dead-end
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
        $I->makeScreenshot("mogwai-{$c}");
    }
}