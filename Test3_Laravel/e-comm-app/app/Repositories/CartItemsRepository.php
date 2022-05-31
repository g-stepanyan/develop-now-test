<?php

namespace App\Repositories;

use App\Interfaces\MainInterface;
use App\Models\CartItem;

class CartItemsRepository implements MainInterface
{
    public function getAll()
    {
        return CartItem::all();
    }

    public function getById($id)
    {
        return CartItem::findOrFail($id);
    }

    public function delete($id)
    {
        CartItem::destroy($id);
    }

    public function create(array $data)
    {
        return CartItem::create($data);
    }

    public function update($id, array $data)
    {
        return CartItem::whereId($id)->update($data);
    }
}
