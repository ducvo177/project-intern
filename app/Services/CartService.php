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
        $this->cart = $this->cart->push([
            'id' => $course->id,
            'name' => $course->name,
            'price' => $course->price,
            'image' => $course->attachment->file_name,
            'quantity' => 1
        ]);
        session()->put('cart', $this->cart);
    }

    public function update($course)
    {
        $this->cart = $this->cart->map(function ($cartItem) use ($course) {
            if ($cartItem['id'] == $course->id) {
                ++$cartItem['quantity'];
            }
            return $cartItem;
        });

        session()->put('cart', $this->cart);
    }

    public function updateQuantity($quantity)
    {
        $this->cart = $this->cart->map(function ($cartItem, $key) use ($quantity) {
            $cartItem['quantity'] = $quantity[$key];
            return $cartItem;
        });
        session()->put('cart', $this->cart);
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
        return !$this->cart->where('id', $id)->isEmpty();
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
