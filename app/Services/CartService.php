<?php

namespace App\Services;

class CartService
{
    protected $cart;
    public function __construct()
    {
        $this->cart = session()->get('cart') ?? collect();
    }

    public function insert($course)
    {
        $course->quantity = 1;
        $course->image = $course->attachment->file_name;
        $this->cart = $this->cart->push($course);
        session()->put('cart', $this->cart);
    }

    public function update(array $quantityList, $isReplace = true)
    {
        foreach ($quantityList as $key => $quantity) {
            $this->cart = $this->cart->map(function ($cartItem) use ($quantity, $isReplace, $key) {
                if ($cartItem['id'] == $key) {
                    $isReplace ? $cartItem['quantity'] = $quantity : $cartItem['quantity'] += $quantity;
                }
                return $cartItem;
            });

            session()->put('cart', $this->cart);
        }
    }

    public function total()
    {
        return $this->cart->count();
    }

    public function getAll()
    {
        return $this->cart;
    }

    public function exist($id)
    {
        return $this->cart->where('id', $id)->isNotEmpty();
    }

    public function removeItem($id)
    {
        $this->cart = $this->cart->filter(function ($cartItem) use ($id) {
            return $cartItem['id'] !== (int) $id;
        });
        session()->put('cart', $this->cart);
    }

    public function destroy()
    {
        session()->forget('cart');
    }
}
