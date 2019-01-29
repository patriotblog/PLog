<?php
namespace PLog;

class PLogSend
{
    const API_ENDPOINT = 'http://inception.easys.ir/site/send';

    private $receiver;
    private $message;

    protected $username;
    protected $password;



    function __construct($receiver, $message){
        $this->receiver = $receiver;
        $this->message = $message;

        $this->checkConfig();

        return $this;
    }

    public static function Send($receiver, $message){
        $model = new self($receiver, $message);
        return $model->execute();
    }
    public function execute(){

        $telegram = new PTelegramRequest();

        $telegram->easy_shop_id = '-1';

        $telegram->receiver = $this->receiver;
        $telegram->message = $this->message;
        $telegram->notification_id = rand(100000,1000000);
        $telegram->sequence_id = false;



        $params = [
            'Telegram'=>json_encode($telegram)
        ];

        $response = $this->request($params);
        return $this->response($response);
    }

    private function checkConfig(){
        $config_path = dirname(__FILE__).'/config.php';
        if(!file_exists($config_path)){
            throw new \Exception("config file missing");
        }
        $config = require ($config_path);

        if(isset($config['username'])){
            $this->username = $config['username'];
        }else{
            throw new \Exception("config file is corrupted");
        }

        if(isset($config['password'])){
            $this->password = $config['password'];
        }else{
            throw new \Exception("config file is corrupted");
        }
    }
    private function apiUri(){
        return  self::API_ENDPOINT."?auth_username=".$this->username."&auth_password=".$this->password;
    }
    private function request($params){
        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $this->apiUri());

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);


        curl_setopt($ch, CURLOPT_POST, 1);


        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $content = trim(curl_exec($ch));
        curl_close($ch);

        return $content;
    }
    private function response($response){
        $object = json_decode($response);
        if(isset($object->status) && $object->status == 'OK')
            return true;
        return false;

    }
}
