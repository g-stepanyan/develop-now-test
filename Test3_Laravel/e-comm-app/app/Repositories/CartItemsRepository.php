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

    public function storeOrUpdate($data, $id = null)
    {
        $cartItem = is_null($id) ? new CartItem() : CartItem::find($id);

        if (isset($data['product_id'])) {
            $cartItem->product_id = $data['product_id'];

            $cartItem->save();
        }

        return CartItem::with(['products'])->findOrFail($cartItem->id);
    }

    public function delete($id)
    {
        CartItem::destroy($id);
    }
}
