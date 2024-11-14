<?php

namespace App\Facades\Model;

use Illuminate\Support\Facades\Facade;

class RuanganModel extends \App\Dao\Models\Ruangan
{
    protected static function getFacadeAccessor()
    {
        return getClass(__CLASS__);
    }
}