<?php

require __DIR__ . '/../vendor/autoload.php';

use mkharla\isdk\InstagramSDK;

$sdk = new InstagramSDK();

$name = 'mykhailo';
$code = '38f9de106d8b4b06b8cde4cb1f088ffa';
$userId = 5765505425;
$mediaId = '1564445074136647591_5765505425';
$mediaShortName = 'BW2BoGShken';

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
//print_r($sdk->likes()->deleteFromMedia(sadas));

die;
