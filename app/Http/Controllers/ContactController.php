<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
  
        $contacts = Contact::orderBy('id' );
     

        if ($request->get('contact_email')) {
            $contacts = Contact::where('contact_email', 'like', '%' . $request->contact_email . '%');
        }
        if ($request->get('contact_phone')) {
            $contacts = Contact::where('contact_phone', 'like', '%' . $request->contact_phone . '%');
        }
        
        $contacts = $contacts->orderBy('id' , 'desc')->paginate(20);

        
        return response()->view('cms.Contact.index' , compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $contacts = Contact::all();
        return response()->view('cms.contact.create', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = validator($request->all(), [
            'contact_name' => ['required', 'min:3', 'max:255'],
            'contact_email' => ['required', 'min:3', 'max:255'],
            'contact_phone' => ['required'],
            'contact_message' => ['required'],
        ]);

        if (!$validator->fails()) {
            $contacts = new Contact();
            $contacts->contact_name = $request->get('contact_name');
            $contacts->contact_email = $request->get('contact_email');
            $contacts->contact_phone = $request->get('contact_phone');
            $contacts->contact_message = $request->get('contact_message');
            $isSaved = $contacts->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Created is Successfuly"], 200);

            } else {
                return response()->json(['icon' => 'error', 'title' => "Created is Failed"], 400);

            }

        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts = Contact::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
