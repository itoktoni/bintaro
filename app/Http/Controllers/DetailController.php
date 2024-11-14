<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Core\MasterController;
use App\Http\Function\CreateFunction;
use App\Http\Function\UpdateFunction;
use App\Services\Master\SingleService;
use App\Facades\Model\DetailModel;
use App\Facades\Model\JenisModel;
use App\Facades\Model\RuanganModel;

class DetailController extends MasterController
{
    use CreateFunction, UpdateFunction;

    public function __construct(DetailModel $model, SingleService $service)
    {
        self::$service = self::$service ?? $service;
        $this->model = $model::getModel();
    }

    public function getTable()
    {
        $data = $this->getData();

        $ruangan = RuanganModel::getAllByKey();
        $jenis = JenisModel::getAllByKey();

        return moduleView(modulePathTable(), [
            'data' => $data,
            'ruangan' => $ruangan,
            'jenis' => $jenis,
            'fields' => $this->model::getModel()->getShowField(),
        ]);
    }
}
