<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Resources\ClientResource as clientResource;

class ClientsController extends Controller
{
    public function index()
    {
        return clientResource::collection(Client::all());
    }

    public function create()
    {
        return view('clients.create', ['clients' => Client::all()]);
    }
    public function store()
    {
        $this->validation(request());
        $imageName = request('name') . '.' . request('logo')->getClientOriginalExtension();
        $input = [
            'name' => request('name'),
            'logo' => $imageName,
            'link' => $this->makeLink(request('link'))
        ];
        if (Client::create($input)) {
            request('logo')->move(public_path('/uploaded_images/clients_logo/'), $imageName);
            Alert::success('Success', 'Client added');
            return back();
        } else {
            Alert::error('Failed', 'Failed to add client');
            return back();
        }
        return back();
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(Client $client)
    {
        $update = [
            'name' => request('name'),
            'link' => $this->makeLink(request('link'))
        ];
        if (request()->hasFile('logo')) {
            $this->validation(request());
            $imageName = request('name') . '.' . request('logo')->getClientOriginalExtension();
            $update['logo'] = $imageName;
            if ($client->update($update)) {
                request('logo')->move(public_path('/uploaded_images/clients_logo/'), $imageName);
                Alert::success('Success', 'Client Updated');
                return redirect('/clients/create');
            } else {
                Alert::error('Error', 'Update failed');
                return redirect('/clients/create');
            }
        } else {
            $this->validate(request(), [
                'name' => 'required|min:3',
                'link' => 'required'
            ]);
            if ($client->update($update)) {
                Alert::success('Success', 'Client Updated');
                return redirect('/clients/create');
            } else {
                Alert::error('Error', 'Update failed');
                return redirect('/clients/create');
            }
        }
    }

    public function destroy(Client $client)
    {
        if ($client->delete()) {
            @unlink(public_path('/uploaded_images/clients_logo/') . $client->logo);
            Alert::success('Success', 'Client deleted');
            return back();
        } else {
            Alert::error('Error', 'Client could not be deleted');
            return back();
        }
        return back();
    }

    private function validation($data)
    {
        return $this->validate($data, [
            'name' => 'required|min:3',
            'logo' => 'required|image',
            'link' => 'required'
        ]);
    }

    private function makeLink($data)
    {
        if (!Str::contains($data, 'https://')) {
            return 'https://' . $data;
        } else {
            return $data;
        }
    }
}
