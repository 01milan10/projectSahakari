<?php

namespace App\Http\Controllers;

use App\Download;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class downloadsController extends Controller
{
    //Download Controller
    public function showDownloadables(){
        $downloads = Download::all();
        return view ('downloads.backendDownloads',['downloads'=>$downloads]);
    }

    public function uploadDownloadables(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'file'=>'required',
        ]);
        $filename=$request->file->getClientOriginalName();
        $input = [
            'title'=>$request['title'],
            'file'=>$filename,
        ];
        if (Download::create($input)){
            $request['file']->move(public_path('uploaded_files'), $filename);
            Alert::success("Success",'File Added Successfully');
        }
        else{
            Alert::error("Error","File could not be added.");
        }
        return back();
    }

    public function deleteDownloadables($id){
        $download = Download::find($id);
        $filename=$download->file;
        $filePath = public_path('uploaded_files/').$filename;
        if (file_exists($filePath)){
            Download::find($id)->delete();
            @unlink($filePath);
            Alert::success('Success','File Deleted Successfully');
        }
        return back();
    }

    public function makeDownload($id){
        $download=Download::find($id);
        $filename=$download->file;
        $filePath = public_path('uploaded_files/').$filename;
        if (file_exists($filePath)){
            return response()->download($filePath);
        }
    }
}
