<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SaleService;
use App\Http\Requests\SaleRequest;

class SaleController extends Controller
{
    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->saleService->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        try {
            $data = $request->all();

            $this->saleService->store($data);
            return Response()->json(['message'=>'Venda Concluida com sucesso!'], 201);
        } catch (\Throwable $th) {
            Log::debug($th);
            return Response()->json(['message'=>'Ocorreu um erro ao finalizar a solicitação'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->saleService->showById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->saleService->updateById($request, $id);
            return Response()->json('Venda Alterada com sucesso!', 200);
        } catch (\Throwable $th) {
            return Response()->json('Ocorreu um erro!', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->saleService->destroyById($id);
            return Response()->json('Venda Excluida com sucesso!', 200);
        } catch (\Throwable $th) {
            return Response()->json('Ocorreu um erro!', 400);
        }
    }
}
