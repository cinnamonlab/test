<?php

if ( ! defined ('__APP__') ) {
    define('__APP__', __DIR__ . '/..');
}

return array(
    'default' => __APP__ . "/storage/logs/app-" . date('Y-m-d') . ".log"
);
