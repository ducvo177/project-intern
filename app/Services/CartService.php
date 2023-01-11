<?php

namespace App\Services;

class CartService
{
    public function insert($course)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $colection = collect(['id', 'name', 'price', 'quantity']);
            $combine=$colection->combine([$course->id, $course->name, $course->price, 1]);
            
            session()->put('cart',$combine);
        }
        dd(session()->get('cart'));
    }
    public function update()
    {
    }
    public function total()
    {
    }
    public function exists()
    {
    }
    public function removeItem()
    {
    }
    public function destroy()
    {
    }
}
