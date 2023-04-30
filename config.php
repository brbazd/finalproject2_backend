<?php
return [
    'database'=>[
        'servername'=>'localhost',
        'user'=>'root',
        'pass'=>'',
        'dbname'=>'photoalbum',
        "options"=>[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ]
    ]
];