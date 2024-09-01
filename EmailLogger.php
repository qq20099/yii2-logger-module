<?php


namespace app\modules\logger;


use Yii;

class EmailLogger
{
    private $type;
    private $email;
    private $subject;
    private $send_from;

    public function __construct(array $config)
    {
        $this->type = 'email';
        $this->email = (isset($config['email']) && !empty($config['email'])) ? $config['email'] : Yii::$app->params['adminEmail'];
        $this->subject = $config['subject'];
        $this->send_from = (isset($config['from']) && !empty($config['from'])) ? $config['from'] : Yii::$app->params['senderEmail'];

        if (!$this->email) {
            throw new \Exception('Необходимо указать почту получателя');
        }
        if (!$this->send_from) {
            throw new \Exception('Необходимо указать почту отправителя');
        }
    }

    public function send(string $message): void
    {
        Yii::$app->mailer->compose()
            ->setFrom($this->send_from)
            ->setTo($this->email)
            ->setSubject($this->subject)
            ->setTextBody($message)
            ->send();
    }

    public function getType(): string
    {
        return $this->type;
    }

}