<?php
namespace PLog;
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/1/19
 * Time: 5:00 PM
 */
class PLog
{
    /**
     * @param $message string
     * @param null|string $receiver
     * @return bool
     */
    public static function Send($message, $receiver=null){
        $model = new PLogSend($message, $receiver);
        return $model->execute();
    }

    /**
     * @param $e \Exception
     * @param $receiver
     * @return boolean
     */
    public static function Exception($e, $receiver=null){

        $msg = '<b>'.$e->getCode().':'.$e->getMessage().'</b>'.PHP_EOL;
        $msg .= $e->getFile() ;
        $msg .= ' ('.$e->getLine().')' .PHP_EOL;


        $msg .= $e->getTraceAsString();

        //$stack = explode(PHP_EOL,$e->getTraceAsString());
        //$msg .= current($stack);


        if(empty($msg)){
            $msg = 'empty exception '.json_encode($e);
        }


        $model = new PLogSend($msg, $receiver);
        return $model->execute();
    }

}