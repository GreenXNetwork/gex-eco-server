<?php

return [
    'namespaces' => [
        'App' => base_path() . DIRECTORY_SEPARATOR . 'app'
    ],


    'protection_middleware' => [
        'auth:api' // <--- Checks for access token and logging in the user
    ],

    'resource_namespace' => 'resources',

    'language_folder_name' => 'lang',

    'view_folder_name' => 'views'
];