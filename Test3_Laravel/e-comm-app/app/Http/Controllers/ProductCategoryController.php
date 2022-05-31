<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository as Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductCategoryController extends AppController
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
        $data = $request->only(['name']);

        return response()->json(['data' => $this->repository->create($data)], Response::HTTP_CREATED);
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
        $data = $request->only(['name']);

        return response()->json([
            'data' => $this->repository->update($id, $data)
        ]);
    }
}
