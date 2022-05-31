<?php

namespace App\Repositories;

use App\Interfaces\MainInterface;
use App\Models\Product;

class ProductRepository implements MainInterface
{
    public function getAll()
    {
        return Product::with(['categories'])->get()->all();
    }

    public function getById($id)
    {
        return Product::findOrFail($id);
    }

    public function delete($id)
    {
        Product::destroy($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        return Product::whereId($id)->update($data);
    }
}
