<?php

namespace App\Dao\Models;

use App\Dao\Builder\DataBuilder;
use App\Dao\Models\Core\SystemModel;


/**
 * Class Detail
 *
 * @property $detail_rfid
 * @property $detail_id_ruangan
 * @property $detail_id_jenis
 * @property $detail_status_linen
 * @property $detail_updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Detail extends SystemModel
{
    protected $perPage = 20;
    protected $table = 'detail';
    protected $primaryKey = 'detail_rfid';
    protected $filters = [
        'detail_rfid',
        'detail_id_ruangan',
        'detail_id_jenis',
        'detail_updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['detail_rfid', 'detail_id_ruangan', 'detail_id_jenis', 'detail_status_linen', 'detail_updated_at'];

    public static function field_name()
    {
        return 'detail_rfid';
    }

    public function getFieldNameAttribute()
    {
        return $this->{$this->field_name()};
    }

    public function detail_updated_at($query, $value)
    {
        return $query->whereDate('detail_updated_at', $value);
    }

    public function fieldDatatable(): array
    {
        return [
            DataBuilder::build($this->field_key())->name('RFID'),
            DataBuilder::build('detail_id_jenis')->name('Jenis Linen')->sort(),
            DataBuilder::build('detail_id_ruangan')->name('Lokasi')->sort(),
            DataBuilder::build('detail_status_linen')->name('Status')->sort(),
            DataBuilder::build('detail_updated_at')->name('Penggunaan Terakhir')->sort(),
        ];
    }

}
