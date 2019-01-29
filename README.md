# PLog
Rest-Full webservice for sending message to telegram groups or users throw Telegram Bot Api

## Installation
### Using Composer
```sh
composer require patriotblog/plog:dev-master
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
 
 ```php
 $result = PLogSend::Send('new record saved', 'eLogs');
 ```
 or if you set default_receiver:
 
 ```php
 $result = PLogSend::Send('new record saved');
 ```
 

