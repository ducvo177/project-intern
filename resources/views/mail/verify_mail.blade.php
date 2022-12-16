<x-mail::message>
<h1 class="title text-primary">Hello {{$name}}</h1>
<img class="img-responsive img-logo " src="{{ asset('/assets/img/email.webp')}}">
<h1 class="text-center">Please Verify your email</h1>
<h3 class="text-center">Amazing deals, updates, interesting news right in your inbox</h3>
<x-mail::button :url="$url">
Verify
</x-mail::button>
</x-mail::message>



