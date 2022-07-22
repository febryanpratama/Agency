<?php

namespace App\Services\Service;

use App\Models\Service;
use Illuminate\Support\Facades\File;

class Services
{

    public function getAll()
    {
        $data = Service::get();

        $status = true;
        $message = 'Success';

        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }
    public function store($data)
    {

        if ($data['icon']) {
            // Get filename with the extension
            $filenameWithExt = $data['icon']->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $data['icon']->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $data['icon']->storeAs('public/icons', $fileNameToStore);

            $data['icon'] = $fileNameToStore;
        } else {

            $$fileNameToStore = "default.png";

            $data['icon'] = $fileNameToStore;
        }

        Service::create($data);

        $status     = true;
        $message    = 'Service created successfully';

        $result     = [
            'status'    => $status,
            'message'   => $message,
        ];

        return $result;
    }

    public function getById($id)
    {
        $data = Service::find($id);

        $status = true;
        $message = 'Success';

        $result = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }

    public function update($data, $id)
    {
        $service = Service::find($id);

        if ($data['icon']) {

            File::delete('storage/icons/' . $service->icon);

            $filenameWithExt = $data['icon']->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $data['icon']->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $data['icon']->storeAs('public/icons', $fileNameToStore);
            $data['icon'] = $fileNameToStore;
        } else {
            $$fileNameToStore = "default.png";
            $data['icon'] = $fileNameToStore;
        }

        $service->update($data);

        $status = true;
        $message = 'Service updated successfully';
        $result = [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    public function delete($id)
    {
        $service = Service::find($id);
        File::delete('storage/icons/' . $service->icon);
        $service->delete();

        $status = true;
        $message = 'Service deleted successfully';
        $result = [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
