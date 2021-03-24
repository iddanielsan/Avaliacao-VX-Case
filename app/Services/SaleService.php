<?php

namespace App\Services;

use App\Contracts\ServiceContract;
use Carbon\Carbon;
use App\Repositories\SaleRepository;
use App\Models\Sale;
use Illuminate\Support\Facades\Log;

class SaleService implements ServiceContract {
    private $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function index($request)
    {
        if(isset($request->per_page))
            $per_page = $request->per_page;
        else 
            $per_page = 20;

        return $this->saleRepository->index($per_page);
    }

    public function showById($id)
    {
        return $this->saleRepository->showById($id);
    }

    public function store($data)
    {
        return $this->saleRepository->create($data);
    }

    public function updateById($data, $id)
    {
        return $this->saleRepository->updateById($data, $id);
    }

    public function destroyById($id)
    {
        return $this->saleRepository->destroyById($id);
    }
}