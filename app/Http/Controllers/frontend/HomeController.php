<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $courses = Course::latest()->limit(6)->get();
        return view('home', compact('courses'));
    }

    public function course_show($slug){
        $item = Course::where('slug', $slug)->first();
        return view('course', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $contacts = new Contact;
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->message = $request->message;
        $contacts->save();

        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function show()
    {
        $contacts = Contact::all();
        return view('admin.contact.contact-index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Contact delete successfully');
    }

}
