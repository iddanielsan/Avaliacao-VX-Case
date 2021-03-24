<?php

namespace App\Repositories;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;


class SaleRepository extends EloquentRepository {
    protected $sale;

    public function __construct(Sale $model)
    {
        parent::__construct($model);
    }

    public function index($per_page = 20)
    {
        return $this->model::with('products:name,delivery_days')->paginate($per_page);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $instance = $this->model->create([
            "purchase_at" => Carbon::parse($data['purchase_at']),
            "amount" => $data['amount'],
            "delivery_days" => $data['delivery_days']
        ]);

        $instance->products()->sync($data["products"]);

        return $instance;
    }

    
    /**
     * @param $id
     * @return mixed
     */
    public function showById($id)
    {
        return $this->model::with('products:name,delivery_days')->find($id);
    }


    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateById($data, $id)
    {
        $sale = $this->model::find($id);
        $sale->purchase_at = Carbon::parse($data->purchase_at);
        $sale->save();

        $sale->products()->sync($request->products);

        return $sale;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyById($id)
    {
        $sale = $this->model::find($id);
        $sale->products()->detach();
        $sale->delete();

        return $sale;
    }
}