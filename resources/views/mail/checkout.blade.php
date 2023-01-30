<x-mail::message>
<h1 class="title text-primary text-center">This is your checkout!!</h1>
@foreach ($cart as $cartItem)
<div class="row mb-4 d-flex justify-content-between">
    <div class="col-md-2 col-lg-2 col-xl-2">
        <img src="{{ URL::asset('storage/attachments/' . $cartItem['image']) }}"
            class="img-fluid rounded-3 w-50 h-25" alt="Cotton T-shirt">
    </div>
    <div class="col-md-3 col-lg-3 col-xl-3">
        <h5 class="text-black mb-0">{{ $cartItem['name'] }}</h5>
    </div>
    <h2>{{ $cartItem['quantity'] }}<h2>
</div>
<hr class="my-4">
@endforeach
<h2>Total Price: {{ $total }}$</h2>
<h3 class="text-center">Thanks for your shopping </h3>
</x-mail::message>



