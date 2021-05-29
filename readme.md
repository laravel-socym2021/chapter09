# PHPフレームワーク Laravel Webアプリケーション開発 - chapter09 サンプルコード

## 対応

### 9-1 ユニットテスト

* app/Services/CalculatePointService.php
* app/Exceptions/PreconditionException.php
* tests/Unit/CalculatePointServiceTest.php
* phpunit.xml

### 9-2 データベーステスト

* app/Services/AddPointService.php
* app/Models/PointEvent.php
* app/Models/EloquentCustomerPointEvent.php
* app/Models/EloquentCustomerPoint.php
* app/Models/EloquentCustomer.php
* phpunit.xml
* database/factories/EloquentCustomerFactory.php
* tests/Unit/EloquentCustomerPointEventTest.php
* tests/Unit/EloquentCustomerPointTest.php
* tests/Unit/AddPointServiceTest.php
* tests/Unit/AddPointServiceWithMockTest.php

### 9-3 WebAPIテスト

* routes/api.php
* tests/Feature/Api/PingTest.php
* app/Http/Actions/AddPointAction.php
* app/Http/Requests/AddPointRequest.php
* app/UseCases/AddPointUseCase.php
* app/Exceptions/PreconditionException.php
* app/Exceptions/Handler.php
* tests/Feature/Api/AddPointTest.php
* tests/Feature/Api/AuthTest.php
* tests/Feature/Api/WithoutMiddlewareTest.php
* tests/Feature/Api/MailTest.php
* tests/Feature/Api/MiddlewareTest.php
* phpunit.xml

## Usage

* 本章サンプルコードは、docker-compose で動作します。
* 実行する際は、Docker, docker-dompose のインストールを行った後に下記の手順を実行して下さい。

```sh
$ git clone https://github.com/laravel-socym2021/chapter09.git
$ cd chapter09
$ make
```

* 実行環境を破棄するには下記のように `make clean` コマンドを実行してください。

```sh
$ make clean
```
