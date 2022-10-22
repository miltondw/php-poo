<?php

namespace Miltondw\Poo\utils;

class Uuid
{
    public static function generate()
    {
        return uniqid();
    }
}
