# Yii2 Log Module

## Опис

Цей модуль Yii2 надає функціональність для логування повідомлень у різні виходи, такі як файли, бази даних або електронна пошта. Ви можете конфігурувати різні типи логування через конфігураційний файл вашого додатку.

## Встановлення

Щоб додати цей модуль до вашого Yii2 додатку, виконайте наступні кроки:

1. **Клонування або завантаження модуля**

   Клонуйте репозиторій або завантажте модуль:

   ```bash
   git clone https://github.com/qq20099/yii2-logger-module.git

увімкнути ЧПУ в налаштуваннях додатку

виконати міграцію
```bash
php yii migrate --migrationPath=@app/modules/logger/migrations

Налаштування

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