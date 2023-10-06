<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'content' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'content' => $request->input('content'),
        ]);
        return redirect()->route('home')->with('notification', 'Cảm ơn bạn đã liên hệ!');
    }
    public function index(){
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contact.index', ['contacts' => $contacts]);
    }
}
