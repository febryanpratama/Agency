<?php

namespace App\Services\StudyCase;

use App\Models\CaseStudy;
use Illuminate\Support\Facades\File;

class StudyCase
{
    public function getAll()
    {
        $data = CaseStudy::all();

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

        if ($data['photo']) {
            # code...
            // Get filename with the extension
            $filenameWithExt = $data['photo']->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $data['photo']->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $data['photo']->storeAs('public/photo', $fileNameToStore);

            $data['photo'] = $fileNameToStore;
        } else {

            $$fileNameToStore = "default.png";

            $data['photo'] = $fileNameToStore;
        }

        CaseStudy::create($data);

        $status     = true;
        $message    = 'Case Study created successfully';

        $result     = [
            'status'    => $status,
            'message'   => $message,
        ];

        return $result;
    }

    public function getById($id)
    {
        $data = CaseStudy::find($id);

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
        $res = CaseStudy::find($id);

        if ($data['photo']) {
            # code...
            File::delete('storage/photo/' . $res['photo']);
            // Get filename with the extension
            $filenameWithExt = $data['photo']->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $data['photo']->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $data['photo']->storeAs('public/photo', $fileNameToStore);

            $data['photo'] = $fileNameToStore;
        } else {

            $$fileNameToStore = "default.png";

            $data['photo'] = $fileNameToStore;
        }

        $res->update($data);

        $status     = true;
        $message    = 'Case Study updated successfully';

        $result     = [
            'status'    => $status,
            'message'   => $message,
        ];

        return $result;
    }

    public function delete($id)
    {
        $res = CaseStudy::find($id);

        File::delete('storage/photo/' . $res['photo']);

        $res->delete();

        $status     = true;
        $message    = 'Case Study deleted successfully';

        $result     = [
            'status'    => $status,
            'message'   => $message,
        ];

        return $result;
    }
}
