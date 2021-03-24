<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;


class ProductRepository extends EloquentRepository {
    protected $product;

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function index($data)
    {
        if(isset($data->product_name)) {
            $query = strtoupper($data->product_name);
            return $this->model::where('name','LIKE','%'.$query.'%')
            ->orWhere('reference','LIKE','%'.$query.'%')->get();
        }

        return $this->model::all();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function showById($id)
    {
        return $this->model::find($id);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateById($data, $id)
    {
        $product = $this->model::find($id);
        $product->name = $data->name;
        $product->reference = $data->reference;
        $product->price = $data->price;
        $product->delivery_days = $data->delivery_days;
        $product->save();

        return $product;
    }

        /**
     * @param $id
     * @return mixed
     */
    public function destroyById($id)
    {
        $product = $this->model::find($id);
        $product->delete();

        return $product;
    }
}