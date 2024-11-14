<?php

namespace App\Facades\Model;

use Illuminate\Support\Facades\Facade;

class DetailModel extends \App\Dao\Models\Detail
{
    protected static function getFacadeAccessor()
    {
        return getClass(__CLASS__);
    }
}