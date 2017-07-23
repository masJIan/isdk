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
    'redirect_url'      =>  'yuor-redirect-url',

    /*
    |--------------------------------------------------------------------------
    | Instagram API Client information
    |--------------------------------------------------------------------------
    |
    | This array will be passed to the Instagram SDK client.
    */

    'client'  => [
        'id'            =>  'your-client-id',
        'secret'        =>  'your-secret-key',
    ],

    /*
    |--------------------------------------------------------------------------
    | Login Permissions (Scopes)
    |--------------------------------------------------------------------------
    |
    | The OAuth 2.0 specification allows you to specify the scope of the access you are requesting from the user
    |
    |   + basic             - to read a user’s profile info and media
    |   + public_content    - to read any public profile info and media on a user’s behalf
    |   + follower_list     - to read the list of followers and followed-by users
    |   + comments          - to post and delete comments on a user’s behalf
    |   + relationships     - to follow and unfollow accounts on a user’s behalf
    |   + likes             - to like and unlike media on a user’s behalf

    */

    'permissions'   =>  [
        'basic',
        'public_content'
    ],

    /*
    |--------------------------------------------------------------------------
    | HTTP client
    |--------------------------------------------------------------------------
    |
    | SDK should be implemented using poor PHP (5.6 / 7 , without any frameworks)
    | I was not sure about using guzzlehttp/guzzle, so I made 2 options you ca chose here:
    |
    |   vendor - guzzlehttp/guzzle
    |   custom - self made
    */

    'http_client'   =>  'vendor',

    /*
    |--------------------------------------------------------------------------
    | TASK
    |--------------------------------------------------------------------------
    |
    | Notes:
    | You don’t need a front end and you can be sure that third party tool
    | (which will use your SDK) already has an “access_token”.
    */

    'access_token' => 'your-access-token-here'
];
