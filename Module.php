<?php


namespace app\modules\logger;

use Yii;
use yii\base\BootstrapInterface;

class Module extends \yii\base\Module implements BootstrapInterface
{
    public $type;
    public $types;
    public $controllerNamespace = 'app\modules\logger\controllers';

    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            [
                'class' => 'yii\web\UrlRule',
                'pattern' => $this->id.'/log',
                'route' => $this->id.'/default/log'
            ], [
                'class' => 'yii\web\UrlRule',
                'pattern' => $this->id . '/<controller:[\w\-]+>/',
                'route' => $this->id . '/<controller>/index'
            ], [
                'class' => 'yii\web\UrlRule',
                'pattern' => $this->id . '/<controller:[\w\-]+>/<action:[\w\-]+>',
                'route' => $this->id . '/<controller>/<action>'
            ],


        ], false);
    }

    public function init()
    {
        parent::init();

        Yii::$app->set('logger', [
            'class' => 'app\modules\logger\components\Logger',
        ]);

        \Yii::$app->getUrlManager()->addRules([
            ///'GET /' => 'logger/default/index',
            ///'GET /log/<message:[\w_-]+>' => 'logger/default/log',
            'GET,POST /log' => 'logger/default/log',
            'GET,POST /log-to/<type:[\w_-]+>' => 'logger/default/log-to',
            'GET,POST /log-to-all' => 'logger/default/log-to-all',
            //'GET /write-db/<message>' => 'logger/default/write-to-db',
            //'GET /write/<message>' => 'logger/default/write',
        ], false);


    }

    public function getMigrationPath()
    {
        return __DIR__ . '/migrations';
    }
}