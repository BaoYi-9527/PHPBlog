<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],
        'aliyun' => [
            'driver'     => 'aliyun',
            'access_id'  => env('ALIYUN_OSS_ACCESS_ID'),             // For example: LTAI4**************qgcsA
            'access_key' => env('ALIYUN_OSS_ACCESS_KEY'),            // For example: PkT4F********************Bl9or
            'bucket'     => env('ALIYUN_OSS_BUCKET'),                // For example: my-storage
            'endpoint'   => env('ALIYUN_OSS_ENDPOINT'),              // For example: oss-cn-shanghai.aliyuncs.com
            'internal'   => env('ALIYUN_OSS_INTERNAL', null),        // For example: oss-cn-shanghai-internal.aliyuncs.com
            'domain'     => env('ALIYUN_OSS_DOMAIN', null),          // For example: oss.my-domain.com
            'use_ssl'    => env('ALIYUN_OSS_USE_SSL', false),        // Whether to use https
            'prefix'     => env('ALIYUN_OSS_PREFIX', null),          // The prefix of the store path
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */
    # 符号链接
    'links' => [
        public_path('storage') => env('STORAGE_PUBLIC_LINK', storage_path('app/public')),
        public_path('worry')   => env('STORAGE_WORRY_LINK', storage_path('app/worry')),
        public_path('images')  => env('STORAGE_IMAGES_LINK', storage_path('app/images')),
    ],

];
