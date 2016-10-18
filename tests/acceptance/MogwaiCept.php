<?php

// @group essential
// inspired by https://github.com/marmelab/gremlins.js

$I = new AcceptanceTester($scenario);
$I->wantTo('Click random links');

$I->amGoingTo('start on the home page');
$url = '/';
$I->amOnPage($url);
$I->wait(1);

if (getenv('TEST_MOGWAI_USER') && getenv('TEST_MOGWAI_PASS')) {
    $I->login(getenv('TEST_MOGWAI_USER'), getenv('TEST_MOGWAI_PASS'));
}

if (getenv('TEST_MOGWAI_LIMIT')) {
    $limit = getenv('TEST_MOGWAI_LIMIT');
} else {
    $limit = 5;
}

for ($c = 0; $c < $limit; $c++) {

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