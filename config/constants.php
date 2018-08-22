<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Status
     |--------------------------------------------------------------------------
     |
     | Status of everything in this project
     |
     */
    'status' => [
        'enabled'       => 1,
        'disabled'      => 2,
    ],

    'deleting' => [
        'deleted'       => 1,
        'trash'         => 2,
    ],

    /*
     |--------------------------------------------------------------------------
     | Folder to store document for avatars on S3 Amazon
     |--------------------------------------------------------------------------
     |
     | Define path to store images and files to amazon s3 driver
     |
     */
    'avatar_file_path' => 'public/avatars',

    /*
     |--------------------------------------------------------------------------
     | Max line of page with pagination
     |--------------------------------------------------------------------------
     |
     | Define max line of page
     |
     */
    'paginate_page' => 25,
];
