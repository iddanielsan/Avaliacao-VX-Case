<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->productService->index($request);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $data = $request->all();

            $this->productService->store($data);

            return Response()->json('Produto cadastrado!', 201);
        } catch (\Throwable $th) {
            Log::debug($th);
            return Response()->json('Ocorreu um erro ao cadastrar o produto!', 400);
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
        try {
            return $this->productService->showById($id);
        } catch (\Throwable $th) {
            return Response()->json('Ocorreu um erro ao completar a solicitação.', 400);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            $data = $request->all();
            
            $this->productService->updateById($request, $id);

            return Response()->json('Produto Atualizado!', 200);
        } catch (\Throwable $th) {
            return Response()->json('Ocorreu um erro ao atualizar o produto', 400);
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
            $this->productService->destroyById($id);
            return Response()->json('Produto Excluido!', 200);
        } catch (\Throwable $th) {
            return Response()->json('Erro ao excluir o produto!', 400);
        }
    }
}
