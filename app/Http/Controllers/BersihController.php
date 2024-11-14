<?php

namespace App\Http\Controllers;

use App\Dao\Models\Bersih;
use App\Http\Controllers\Core\MasterController;
use App\Http\Function\CreateFunction;
use App\Http\Function\UpdateFunction;
use App\Services\Master\SingleService;
use App\Facades\Model\BersihModel;
use App\Facades\Model\JenisModel;
use App\Facades\Model\RuanganModel;
use App\Http\Requests\Core\GeneralRequest;
use App\Services\Master\CreateService;

class BersihController extends MasterController
{
    use CreateFunction, UpdateFunction;

    public function __construct(BersihModel $model, SingleService $service)
    {
        self::$service = self::$service ?? $service;
        $this->model = $model::getModel();
    }

    public function postCreate(GeneralRequest $request, CreateService $service)
    {
        return parent::postCreate($request, $service);
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
