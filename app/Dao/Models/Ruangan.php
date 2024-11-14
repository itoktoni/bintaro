<?php

namespace App\Dao\Models;

use App\Dao\Models\Core\SystemModel;
use ElipZis\Cacheable\Models\Traits\Cacheable;

/**
 * Class Ruangan
 *
 * @property $ruangan_id
 * @property $ruangan_naman
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Ruangan extends SystemModel
{
    use Cacheable;

    protected $perPage = 20;
    protected $table = 'ruangan';
    protected $primaryKey = 'ruangan_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['ruangan_id', 'ruangan_nama'];

    public static function field_name()
    {
        return 'ruangan_nama';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }
}
