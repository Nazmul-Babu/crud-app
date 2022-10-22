<?php

namespace App\Http\Controllers;

use App\Models\phoneBook;
use Illuminate\Http\Request;

class phonebookcontroller extends Controller
{
   public function index()
   {
       $contacts= phoneBook::all();
       return view('phonebooklist',compact('contacts'));
   }
   public function create()

   {
       $this->validate(request(),[
         'name'=>'required|min:6',
         'email'=>'required',
         'contact'=>'required'

       ]);

       phoneBook::create([
          'name'=>\request('name'),
          'email'=>\request('email'),
          'contact'=>\request('contact'),
       ]);
       return redirect()->back()->with('success','contact added successfully');
   }
   public function show_edit($id)
   {
       $contact= phoneBook::find($id);
//       dd($contact->toArray());
       return view('edit',compact('contact'));
   }
   public  function edit($id)
   {
       $this->validate(request(),[
           'name'=>'required|min:6',
           'email'=>'required',
           'contact'=>'required'

       ]);
       $contact= phoneBook::find($id);

       $contact->update([
           'name'=>\request('name'),
           'email'=>\request('email'),
           'contact'=>\request('contact')
       ]);
       return redirect()->route('list');

   }

   public function delete ($id)
   {
        phoneBook::findorFail($id)->delete();
        return redirect()->route('list');


   }
}
