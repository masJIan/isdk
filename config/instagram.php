<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Instagram API configurations
    |--------------------------------------------------------------------------
    |
    | General configurations
    */

    'api_url'           =>  'https://api.instagram.com/v1',
    'auth_url'          =>  'https://api.instagram.com/oauth/authorize',
    'access_token_url'  =>  'https://api.instagram.com/oauth/access_token',
    'redirect_url'      =>  'http://mkharla.local/collback',

    /*
    |--------------------------------------------------------------------------
    | Instagram API Client information
    |--------------------------------------------------------------------------
    |
    | This array will be passed to the Instagram SDK client.
    */

    'client'  => [
        'id'            =>  '05e62f100b7f48a58d1f81f193c0513b',
        'secret'        =>  '047978b1f22740f89a9d49dc12776ece',
    ],

    /*
    |--------------------------------------------------------------------------
    | Login Permissions (Scopes)
    |--------------------------------------------------------------------------
    |
    | The OAuth 2.0 specification allows you to specify the scope of the access you are requesting from the user
    |
    |   + basic - to read a user’s profile info and media
    |   + public_content - to read any public profile info and media on a user’s behalf
    |   + follower_list - to read the list of followers and followed-by users
    |   + comments - to post and delete comments on a user’s behalf
    |   + relationships - to follow and unfollow accounts on a user’s behalf
    |   + likes - to like and unlike media on a user’s behalf

    */

    'permissions'   =>  [
        'basic',
        'public_content',
        'follower_list',
        'comments',
        'relationships',
        'likes'
    ],

    /*
    |--------------------------------------------------------------------------
    | HTTP client
    |--------------------------------------------------------------------------
    |
    | SDK should be implemented using poor PHP (5.6 / 7 , without any frameworks)
    | I was not sure about using guzzlehttp/guzzle, so I made 2 options you ca chose here:
    |   vendor - guzzlehttp/guzzle
    |   custom - self made
    */

    'http_client'   =>  'custom',

    /*
    |--------------------------------------------------------------------------
    | TASK
    |--------------------------------------------------------------------------
    |
    | Notes:
    | You don’t need a front end and you can be sure that third party tool
    | (which will use your SDK) already has an “access_token”.
    */

    'access_token' => '5765505425.05e62f1.ea69a936f1534100bbd250d5ace5f959'
];
