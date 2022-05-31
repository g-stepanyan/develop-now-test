<?php

namespace App\Repositories;

use App\Interfaces\MainInterface;
use App\Models\Category;

class CategoryRepository implements MainInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function storeOrUpdate($data, $id = null)
    {
        $category = is_null($id) ? new Category() : Category::find($id);
        $category->name = $data['name'];

        return $category->save();
    }

    public function delete($id)
    {
        Category::destroy($id);
    }
}
