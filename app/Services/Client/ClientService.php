<?php

namespace App\Services\Client;

use App\Models\Client;
use Illuminate\Support\Facades\File;

class ClientService
{
    public function getClient()
    {
        $data = Client::get();

        $status = true;
        $message = 'Success Get Client';

        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];

        return $result;
    }

    public function store($data)
    {
        if ($data['logo']) {
            if ($data['logo']) {
                // Get filename with the extension
                $filenameWithExt = $data['logo']->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $data['logo']->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $data['logo']->storeAs('public/logo', $fileNameToStore);

                $data['logo'] = $fileNameToStore;
            } else {

                $$fileNameToStore = "default.png";

                $data['logo'] = $fileNameToStore;
            }
        }

        Client::create($data);

        $status = true;
        $message = 'Client created successfully';

        $result = [
            'status' => $status,
            'message' => $message
        ];
        return $result;
    }

    public function getClientById($id)
    {
        $data = Client::find($id);

        $status = true;
        $message = 'Success Get Client';

        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];

        return $result;
    }

    public function update($data, $id)
    {
        $client = Client::find($id);

        if ($data['logo']) {
            # code...
            File::delete('storage/logo/' . $client->logo);

            // Get filename with the extension
            $filenameWithExt = $data['logo']->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $data['logo']->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $data['logo']->storeAs('public/logo', $fileNameToStore);

            $data['logo'] = $fileNameToStore;
        } else {
            $data['logo'] = 'default.png';
        }

        $client->update($data);

        $status = true;
        $message = 'Client updated successfully';

        $result = [
            'status' => $status,
            'message' => $message
        ];

        return $result;
    }

    public function delete($id)
    {
        $client = Client::find($id);

        if ($client->logo != 'default.png') {
            # code...
            File::delete('storage/logo/' . $client->logo);
        }

        $client->delete();

        $status = true;
        $message = 'Client deleted successfully';

        $result = [
            'status' => $status,
            'message' => $message
        ];

        return $result;
    }
}
