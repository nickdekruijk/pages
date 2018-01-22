<?php

namespace LaraPages\Pages;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return Page::class;
    }
}
