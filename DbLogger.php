<?php


namespace app\modules\logger;


use Yii;

class DbLogger
{
    private $type;

    public function __construct($config)
    {
        $this->type = 'db';
    }

    public function send(string $message): void
    {
        try {
            $model = new \app\modules\logger\models\Logger();
            $model->message = $message;
            $model->save();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getType(): string
    {
        return $this->type;
    }

}