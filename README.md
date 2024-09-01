INSTALLATION

включить ЧПУ в настройках приложения

выполнить миграцию
php yii migrate --migrationPath=@app/modules/logger/migrations


CONFIGURATION

//web.php or main.php

'modules' => [
    //...
    'logger' => [
        'class' => 'app\modules\logger\Module',
        'type' => 'file', //default
        'types' => [
            'db' => [
                'class' => \app\modules\logger\DbLogger::class,
            ],
            'file' => [
                'class' => \app\modules\logger\FileLogger::class,
                'filePath' => '@runtime/logs/logger.log',
            ],
            'email' => [
                'class' => \app\modules\logger\EmailLogger::class,
                'email' => 'admin@example.com',
                'subject' => 'Log Message',
                'from' => 'noreply@example.com',
            ],
        ],
    ],
],