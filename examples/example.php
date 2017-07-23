<?php

require __DIR__ . '/../vendor/autoload.php';

use mkharla\isdk\InstagramSDK;

$name           = 'your-name-here';
$code           = 'your-code-here';
$userId         = 1;
$mediaId        = 'media-id';
$mediaShortName = 'media-short-name';

$sdk = new InstagramSDK();

/*
 * Auth section
 */

//print_r($sdk->auth()->loginLink('code'));
//print_r($sdk->auth()->getAccessToken($code));

/*
 * User section
 */

//print_r($sdk->user()->current());
//print_r($sdk->user()->media());
//print_r($sdk->user()->findByName($name));
//print_r($sdk->user()->findById($userId));

/*
 * Media section
 */

//print_r($sdk->media()->findById($mediaId));
//print_r($sdk->media()->findByCode($mediaShortName));
//print_r($sdk->media()->search(48.858844, 2.294351));


/*
 * Likes section
 */

//print_r($sdk->likes()->getAllLikesOnMedia($mediaId));
//print_r($sdk->likes()->setOnMedia($mediaId));
//print_r($sdk->likes()->deleteFromMedia($mediaId));

die;
