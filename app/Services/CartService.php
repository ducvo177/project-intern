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

        if ($this->cart->where('id', $course->id)->isNotEmpty()) {
            $this->cart = $this->cart->map(function ($cartItem) use ($course) {
                if ($cartItem['id'] == $course->id) {
                    ++$cartItem['quantity'];
                }
                return $cartItem;
            });

            session()->put('cart', $this->cart);
        } else {
            $this->cart->push([
                'id' => $course->id,
                'name' => $course->name,
                'price' => $course->price,
                'image' => $course->attachment->file_name,
                'quantity' => 1
            ]);
            session()->put('cart', $this->cart);
        }
    }

    public function update()
    {
    }

    public function total()
    {
        $total = 0;
        foreach ($this->cart as $cartItem) {
            $total += $cartItem['quantity'];
        };
        return $total;
    }

    public function exists($id)
    {
        if ($this->cart->where('id', $id)->isNotEmpty()) {
            dd('This course exists in cart');
        }
        dd('This course does not exist in cart');
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
