<?php

namespace App\Repositories;

use App\Interfaces\MainInterface;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductRepository implements MainInterface
{
    public function getAll()
    {
        return Product::with(['products_categories.categories'])->get();
    }

    public function storeOrUpdate($data, $id = null)
    {
        $product = is_null($id) ? new Product() : Product::find($id);

        if (isset($data['name'])) {
            $product->name = $data['name'];
        }

        if (isset($data['price'])) {
            $product->price = $data['price'];
        }

        if (isset($data['image'])) {
            try {
                $product->image = self::doFileUpload($data['image']);
            } catch (\Exception $e) {}
        }

        $product->save();

        if ($product->id && isset($data['category_id'])) {
            self::createProductCategory($product->id, $data['category_id']);
        }

        return Product::with(['products_categories.categories'])->findOrFail($product->id);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        return $product->delete();
    }

    private static function doFileUpload($file)
    {
        $filename = time() . $file->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'product_images/',
            $file,
            $filename
        );

        return $filename;
    }

    private static function createProductCategory($productId, $categoryId)
    {
        $productCategory = new ProductCategory();
        $productCategory->product_id = $productId;
        $productCategory->category_id = $categoryId;

        return $productCategory->save();
    }
}
