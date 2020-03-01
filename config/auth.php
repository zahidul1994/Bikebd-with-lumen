
<?php

return [
     'defaults' => [
        'guard' => 'admin',
        'passwords' => 'admins',
    ],
    'guards' => [
        'user' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'jwt',
            'provider' => 'admins',
        ],
        'superadmin' => [
            'driver' => 'jwt',
            'provider' => 'superadmins',
        ],
    ],
   

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
        'superadmins' => [
            'driver' => 'eloquent',
            'model' => App\Superadmin::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
        
    ],
    

];
