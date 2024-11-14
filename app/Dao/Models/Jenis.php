<?php

namespace App\Dao\Models;

use App\Dao\Models\Core\SystemModel;
use ElipZis\Cacheable\Models\Traits\Cacheable;


/**
 * Class Jenis
 *
 * @property $jenis_id
 * @property $jenis_nama
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Jenis extends SystemModel
{
    use Cacheable;

    protected $perPage = 20;
    protected $table = 'jenis';
    protected $primaryKey = 'jenis_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['jenis_id', 'jenis_nama'];

    public static function field_name()
    {
        return 'jenis_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }
}
