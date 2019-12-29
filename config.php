<?php

define('HOST','localhost');
define('USER','root');
define('PASSWORD','root');
define('DBNAME','demo-news');

$conn = mysqli_connect(HOST,USER,PASSWORD,DBNAME);
if(!$conn)exit;