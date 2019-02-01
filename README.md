# PLog
Rest-Full webservice for sending message to telegram groups or users throw Telegram Bot Api

## Installation
### Using Composer
```sh
composer require patriot/plog:dev-master
```
then, require composer autoloader:
```sh
require __DIR__.'/../vendor/autoload.php';
```

you should create config.php file (copy config-sample.php) and put your credentials in it.

```sh
cd src/PLog
cp config-sample.php config.php
```

#### Config File Attributes
username: Your Inception username

password: Your Inception password

default_receiver: default Telegram group for sending logs to
 
 #### How to Use
 first add namespace
 ```php
 use PLog\PLog;
 ```
 then:
 ```php
 $result = PLog::Send('new record saved', 'LogGroup');
 ```
 or if you set default_receiver:
 
 ```php
 $result = PLog::Send('new record saved');
 ```
 for loging exceptions:
 ```php
  try{
  
    //do some risky staff ;)
    
  }catch(Exception $e){
  
    $result = PLog::Exception($e, 'ExceptionGroup');
    
  }
  ```
 

