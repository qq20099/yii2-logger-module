<?php


namespace app\modules\logger;

use Yii;

class FileLogger
{
    private $type;
    private $filePath;

    public function __construct($config)
    {
        $this->type = 'file';
        $this->filePath = (isset($config['filePath']) && !empty($config['filePath'])) ? Yii::getAlias($config['filePath']) : Yii::getAlias('@runtime/logs/loggger.log');
    }

    public function send(string $message): void
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }

    public function getType(): string
    {
        return $this->type;
    }

}