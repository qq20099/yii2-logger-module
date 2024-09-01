<?php


namespace app\modules\logger\controllers;

use Yii;
use app\modules\logger\LoggerFactory;

class DefaultController extends \yii\web\Controller
{
    /**
     *	Sends a log message to the default logger.
     */
    public function actionLog()
    {
        $logger = Yii::$app->logger;

        $message = (isset($_GET['message'])) ? $_GET['message'] : '';

        if (Yii::$app->request->isPost)
            $message = Yii::$app->request->post('message');

        try {
            if ($message) {
                $type = $logger->getType();
                $logger->send($message);
                return '"'.$message.'" was sent via '.$type."\n";
            }
            throw new \Exception('"message" cannot be empty');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *	Sends a log message to a special logger.
     *
     *	@param string $type
     */
    public function actionLogTo(string $type)
    {
        $logger = Yii::$app->logger;

        $message = (isset($_GET['message'])) ? $_GET['message'] : '';

        if (Yii::$app->request->isPost)
            $message = Yii::$app->request->post('message');

        try {
            if ($message) {
                $logger->setType($type);
                $logger->send($message);

                return '"'.$message.'" was sent via '.$type."\n";
            }
            throw new \Exception('"message" cannot be empty');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *	Sends a log message to all loggers.
     */
    public function actionLogToAll()
    {
        $logger = Yii::$app->logger;

        $message = (isset($_GET['message'])) ? $_GET['message'] : '';

        if (Yii::$app->request->isPost)
            $message = Yii::$app->request->post('message');

        try {
            if ($message) {
                $result = '';

                foreach ($logger->params->types as $type => $value) {
                    $logger->setType($type);
                    $logger->send($message);

                    $result .= '"' . $message . '" was sent via ' . $type . "\n";
                }
                return $result;
            }
            throw new \Exception('"message" cannot be empty');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}