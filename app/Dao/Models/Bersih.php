<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Models\Core\SystemModel;


/**
 * Class Bersih
 *
 * @property $bersih_id
 * @property $bersih_rfid
 * @property $bersih_id_ruangan
 * @property $bersih_id_jenis
 * @property $bersih_date
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Bersih extends SystemModel
{
    protected $perPage = 20;
    protected $table = 'bersih';
    protected $primaryKey = 'bersih_key';
    protected $connection = 'transaction';
    protected $keyType = "string";
    public $filters = [
        'bersih_key',
        'bersih_rfid',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['bersih_key', 'bersih_rfid', 'bersih_id_ruangan', 'bersih_id_jenis', 'bersih_datetime'];

    public static function field_name()
    {
        return 'bersih_rfid';
    }


    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public function bersih_datetime($query, $value)
    {
        return $query->whereDate('bersih_datetime', $value);
    }

    public function fieldDatatable(): array
    {
        return [
            DataBuilder::build($this->field_key())->name('Kode'),
            DataBuilder::build($this->field_name())->name('RFID'),
            DataBuilder::build('bersih_id_jenis')->name('Jenis Linen')->sort(),
            DataBuilder::build('bersih_id_ruangan')->name('Lokasi')->sort(),
            DataBuilder::build('bersih_datetime')->name('Penggunaan Terakhir')->sort(),
        ];
    }
}
