<?php


namespace app\modules\logger;

use Yii;

class LoggerFactory
{
    public static function createLogger($config)
    {
        try {
            if (isset($config->types[$config->type])) {
                return new $config->types[$config->type]['class']($config->types[$config->type]);
            } else {
                return new $config->types['file']['class']($config->types['file']);
            }
        } catch (\Exception $e) {
            throw new $e;
        }
    }
}