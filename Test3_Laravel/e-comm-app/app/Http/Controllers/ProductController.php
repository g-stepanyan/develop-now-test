<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository as Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends AppController
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
            'name' => 'required',
            'price' => 'numeric|min:0',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);

        $data = $request->only(['name', 'price', 'image', 'category_id']);

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
            'price' => 'numeric|min:0',
            'category_id' => 'numeric|exists:categories,id',
        ]);

        $data = $request->only(['name', 'price', 'image', 'category_id']);

        return response()->json([
            'data' => $this->repository->storeOrUpdate($data, $id)
        ]);
    }
}
