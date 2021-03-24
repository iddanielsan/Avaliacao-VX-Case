<?php

namespace App\Services;

use App\Contracts\ServiceContract;
use Carbon\Carbon;
use App\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductService implements ServiceContract {
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index($request)
    {
        return $this->productRepository->index($request);
    }

    public function showById($id) {
        return $this->productRepository->showById($request);
    }

    public function updateById($data, $id) {
        return $this->productRepository->updateById($data, $id);
    }

    public function store($data) {
        return $this->productRepository->create($data);
    }

    public function destroyById($id) {
        return $this->saleRepository->destroyById($id);
    }
}