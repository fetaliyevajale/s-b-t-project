<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use App\Models\BasketProduct;

class CartController extends Controller
{
    /**
     * Add a product to the cart.
     *
     * @param Request $request
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request, $productId)
    {
        // Tapşırılmış məhsulu tapın
        $product = Product::findOrFail($productId);
        // İstifadəçiyə aid səbət yaradın (əgər yoxdursa)
        $basket = Basket::firstOrCreate(['user_id' => auth()->id()]);

        // Məhsulun səbətdə olub olmadığını yoxlayın
        $basketProduct = BasketProduct::where('basket_id', $basket->id)
            ->where('product_id', $productId)
            ->first();

        if ($basketProduct) {
            // Məhsul varsa, miqdarını artırın
            $basketProduct->increment('quantity');
        } else {
            // Məhsul yoxdursa, yeni məhsul yaradın
            $basket->basketProducts()->create(['product_id' => $productId, 'quantity' => 1]);
        }

        return redirect()->route('cart.view');
    }

    /**
     * View the cart.
     *
     * @return \Illuminate\View\View
     */
    public function viewCart()
    {
        // İstifadəçiyə aid səbəti və məhsulları yükləyin
        $basket = Basket::where('user_id', auth()->id())->with('basketProducts.product')->first();
        return view('cart.view', compact('basket'));
    }

    /**
     * Remove a product from the cart.
     *
     * @param int $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFromCart($productId)
    {
        // İstifadəçiyə aid səbəti tapın
        $basket = Basket::where('user_id', auth()->id())->first();

        // Məhsulu səbətdən silin
        if ($basket) {
            $basketProduct = BasketProduct::where('basket_id', $basket->id)
                ->where('product_id', $productId)
                ->first();

            if ($basketProduct) {
                $basketProduct->delete();
            }
        }

        return redirect()->route('cart.view');
    }
}
