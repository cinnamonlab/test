<?php

namespace App\Controller;
use Framework\Blade\View;
use Framework\Config;
use Framework\DB\DB;
use Framework\Log\Log;
use Framework\Redis\Redis;
use Framework\Response;
use Framework\Input;

class SampleController {
    function hello( ) {

        return (new Response())
            ->setContent(Config::get('app.greeting') . ", " . Input::get('name', 'guest'))
            ->setContentType('text/plain')
            ->setCode(200);
    }

    function db( ) {
        $result = DB::query("select * from user limit 10");
        $message = print_r($result, true);

        $result = DB::connection('write')
            ->select('select * from user where created_at > now() - interval ? day limit ?', 100, 2 );
        $message .= print_r($result, true);

        $result = DB::connection('write')
            ->select('select * from user where created_at > now() - interval :interval day limit :limit',
                array(':limit'=>5, ':interval'=>100) );
        $message .= print_r($result, true);

        return (new Response())
            ->setContent($message)
            ->setContentType('text/plain')
            ->setCode(200);

    }

    function redis() {
        Redis::set('test', '123');
        return Redis::get('test');
    }

    function log() {
        Log::getInstance()->error("sample message");
        return Response::json(array("status"=>"success"));
    }

    function blade() {
        return View::make("index")->with("title", "success");
    }
}
