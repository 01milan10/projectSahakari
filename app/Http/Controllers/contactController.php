<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\Contact as contactResource;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class contactController extends Controller
{
    //Contact Controller

    public function getContacts()
    {
        $contacts = Contact::all();
        return contactResource::collection($contacts);
    }

    public function showContactForm()
    {
        $contacts = Contact::all();
        return view('contacts.backendContacts', ['contacts' => $contacts]);
    }

    public function addContact(Request $request)
    {
        $this->validate($request, [
            'location' => 'required',
            'address' => 'required',
            'phone' => 'required|max:10|min:7|numeric',
            'alt_phone' => 'max:10|min:7|numeric',
            'email' => 'required|email:rfc',
        ]);
        if ($request['alt_phone'] == '') {
            $alt_phone = "Not Available";
        } else {
            $alt_phone = $request['alt_phone'];
        }
        if ($request['fax'] == '') {
            $fax = "Not Available";
        } else {
            $fax = $request['fax'];
        }
        Contact::create([
            'district' => $request['location'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'alt_phone' => $alt_phone,
            'fax' => $fax,
            'email' => $request['email'],
        ]);
        Alert::success("Success", "Contact Added Successfully");
        return back();
    }
    public function deleteContact($id)
    {
        Contact::find($id)->delete();
        Alert::Success("Success", "Contact deleted successfully");
        return back();
    }
    public function showUpdateContactForm($id)
    {
        $contact = Contact::find($id);
        //        dd($contact);
        return view('contacts.updateContacts', ['contact' => $contact]);
    }
    public function updateContact(Request $request, $id)
    {
        if ($request['alt_phone'] == '') {
            $alt_phone = "Not Available";
        } else {
            $alt_phone = $request['alt_phone'];
        }
        if ($request['fax'] == '') {
            $fax = "Not Available";
        } else {
            $fax = $request['fax'];
        }
        $update = [
            'district' => $request['location'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'alt_phone' => $alt_phone,
            'fax' => $fax,
            'email' => $request['email'],
        ];
        if (Contact::find($id)->update($update)) {
            Alert::success("Success", "Contacts information changed");
        } else {
            Alert::error('Failed', 'Updating contact information failed');
        }
        return redirect('/addContacts');
    }
}
