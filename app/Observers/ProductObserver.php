<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the product "creating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
    }
}
