<?php

return [

    'randomuser' => [
        'url' => rtrim(env('RANDOM_USER_API_URL', 'https://randomuser.me/api'), '/'),
    ],

    'boredapi' => [
        'url' => rtrim(env('RANDOM_USER_API_URL', 'https://www.boredapi.com/api'), '/'),
    ],

];
