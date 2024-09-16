<?php

class Foo
{
    public function gap()
    {
        //
    }
}

var_dump(
    is_callable([new Foo(), 'foo'], $callable_name),
    $callable_name
);

// var_dump(
//     $_SERVER
// );

// var_dump(
//     parse_url($_SERVER['REQUEST_URI'])
// );
