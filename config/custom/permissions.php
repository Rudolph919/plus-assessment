<?php

return [
    'roles' => [
        'admin' => 'Admin',
        'content-manager' => 'Content Manager',
        'user' => 'User',
    ],

    'permissions' => [
        'view-admin-dashboard',
        'administer-user-permissions',

        //Admin Access
        'admin',

        //Admin - Roles
        'admin.roles.create',
        'admin.roles.view',
        'admin.roles.update',
        'admin.roles.delete',

        //Admin - Users
        'admin.users.create',
        'admin.users.view',
        'admin.users.update',
        'admin.users.delete',
    ],

    'groups' => [
        'admin' => [
            'view-admin-dashboard',
            'admin.users.create',
            'admin.users.view',
            'admin.users.update',
            'admin.users.delete',
        ],
        'content-manager' => [
            'view-admin-dashboard'
        ]
    ]
];
