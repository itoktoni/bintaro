<?php

namespace App\Facades\Model;

use Illuminate\Support\Facades\Facade;

class BersihModel extends \App\Dao\Models\Bersih
{
    protected static function getFacadeAccessor()
    {
        return getClass(__CLASS__);
    }
}