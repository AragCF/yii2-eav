<?php

if (YII_ENV == 'heroku') {
    $url = parse_url(getenv('DATABASE_URL'));
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=' . $url['host'] . ';dbname=' . substr($url['path'], 1),
        'username' => $url['user'],
        'password' => $url['pass'],
        'charset' => 'utf8',
    ];
}
if (getenv('DB') == 'pgsql') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=localhost;dbname=audit_test',
        'username' => 'travis',
        'password' => '',
        'charset' => 'utf8',
    ];
}
if (getenv('DB') == 'sqlite') {
    return [
        'class' => 'yii\db\Connection',
//'dsn' => 'sqlite::memory:', // not persistent ?
        'dsn' => 'sqlite:' . \Yii::getAlias('@tests/_output/temp.db'),
        'charset' => 'utf8',
    ];
}
if (getenv('DB') == 'mysql') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=audit_test',
        'username' => 'travis',
        'password' => '',
        'charset' => 'utf8',
    ];
}

return [
    'class' => '\yii\db\Connection',
    'dsn' => 'sqlite:'.\Yii::getAlias('@tests/_output/temp.db'),
    'username' => '',
    'password' => '',
];