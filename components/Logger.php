<?php


namespace app\modules\logger\components;

use Yii;
use yii\base\Component;
use app\modules\logger\LoggerFactory;
use app\modules\logger\LoggerInterface;

class Logger extends Component implements LoggerInterface
{
    private $logger;
    public $params;

    public function __construct($config = [])
    {
        $this->params = Yii::$app->getModule('logger');

        $this->logger = LoggerFactory::createLogger($this->params);

        parent::__construct($config);
    }

    public function send(string $message): void
    {
        $this->logger->send($message);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->logger->sendByLogger($message, $loggerType);
    }

    public function getType(): string
    {
        return $this->logger->getType();
    }

    public function setType(string $type): void
    {
        $this->params->type = $type;
        $this->logger = LoggerFactory::createLogger($this->params);
    }

}