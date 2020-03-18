<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Oppurtunity;

class backendController extends Controller
{

    //Opportunities controller
    public function showOppurtunitiesForm(){
        return view('oppurtunities.backendOppurtunities');
    }

    public function addOppurtunities(Request $request){
        $this->validate($request,[
           'opening'=>'required',
           'position'=>'required',
           'seat'=>'required',
           'requirement'=>'required',
        ]);
        $input=[
          'opening'=>$request['opening'],
          'position'=>$request['position'],
          'seat'=>$request['seat'],
          'requirement'=>$request['requirement'],
        ];
        Oppurtunity::create($input);
        Alert::success("Success",'Job Posted Successfully.');
        return back();
    }

    public function listOppurtunities(){
        $opportunities=Oppurtunity::all();
        return view('oppurtunities.listOppurtunities',['opportunities'=>$opportunities]);
    }
    public function deleteOppurtunity($id){
        Oppurtunity::find($id)->delete();
        Alert::success('Success','Opening Deleted Successfully');
        return back();
    }

//Contact Controller

    public function showContactForm(){
        $contacts = Contact::all();
        return view('contacts.backendContacts',['contacts'=>$contacts]);
    }

    public function addContact(Request $request){
        $this->validate($request,[
           'location'=>'required',
           'address'=>'required',
           'phone'=>'required|max:10',
           'email'=>'required',
        ]);
        if ($request['alt_phone']==''){
            $alt_phone = "Not Available";
        }
        else{
            $alt_phone = $request['alt_phone'];
        }
        if ($request['fax']==''){
            $fax = "Not Available";
        }
        else{
            $fax = $request['fax'];
        }
        Contact::create([
           'location'=>$request['location'],
           'address'=>$request['address'],
           'phone'=>$request['phone'],
            'alt_phone'=>$alt_phone,
            'fax'=>$fax,
           'email'=>$request['email'],
        ]);
        Alert::success("Success","Contact Added Successfully");
        return back();
    }
    public function deleteContact($id){
        Contact::find($id)->delete();
        Alert::Success("Success","Contact deleted successfully");
        return back();
    }
    public function showUpdateContactForm($id){
        $contact=Contact::find($id);
//        dd($contact);
        return view('contacts.updateContacts',['contact'=>$contact]);
    }
    public function updateContact(Request $request,$id){
        if ($request['alt_phone']==''){
            $alt_phone = "Not Available";
        }
        else{
            $alt_phone = $request['alt_phone'];
        }
        if ($request['fax']==''){
            $fax = "Not Available";
        }
        else{
            $fax = $request['fax'];
        }
        $update = [
            'location'=>$request['location'],
            'address'=>$request['address'],
            'phone'=>$request['phone'],
            'alt_phone'=>$alt_phone,
            'fax'=>$fax,
            'email'=>$request['email'],
        ];
        if(Contact::find($id)->update($update)){
            Alert::success("Success","Contacts information changed");
        }
        else{
            Alert::error('Failed','Updating contact information failed');
        }
        return redirect('/addContacts');
    }






}
