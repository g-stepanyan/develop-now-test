<?php

namespace App\Http\Controllers;

use App\Repositories\CartItemsRepository as Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartItemsController extends AppController
{
    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|numeric|exists:products,id',
        ]);

        $data = $request->only(['product_id']);

        return response()->json(['data' => $this->repository->storeOrUpdate($data)], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'numeric|exists:products,id',
        ]);

        $data = $request->only(['product_id']);

        return response()->json([
            'data' => $this->repository->storeOrUpdate($data, $id)
        ]);
    }
}
