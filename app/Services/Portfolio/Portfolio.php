<?php

namespace App\Services\Portfolio;

use App\Models\Portfolio as ModelsPortfolio;
use Illuminate\Support\Facades\File;

class Portfolio
{
    //

    public function index()
    {
        $data = ModelsPortfolio::all();

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
            // Get filename with the extension
            $filenameWithExt = $data['photo']->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $data['photo']->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $data['photo']->storeAs('public/portfolio', $fileNameToStore);

            $data['photo'] = $fileNameToStore;
        } else {

            $$fileNameToStore = "default.png";

            $data['photo'] = $fileNameToStore;
        }

        // dd($data);
        ModelsPortfolio::create($data);

        $status = true;
        $message = 'Success added portfolio';

        $result = [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    public function show($id)
    {
        $data = ModelsPortfolio::find($id);

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
        $res = ModelsPortfolio::find($id);

        if ($data['photo']) {

            File::delete('storage/portfolio/' . $res['photo']);

            // Get filename with the extension
            $filenameWithExt = $data['photo']->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $data['photo']->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $data['photo']->storeAs('public/portfolio', $fileNameToStore);

            $data['photo'] = $fileNameToStore;
        } else {

            $$fileNameToStore = "default.png";

            $data['photo'] = $fileNameToStore;
        }

        $res->update($data);

        $status = true;
        $message = 'Success updated portfolio';

        $result = [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    public function delete($id)
    {
        $res = ModelsPortfolio::find($id);

        File::delete('storage/portfolio/' . $res['photo']);

        $res->delete();

        $status = true;
        $message = 'Success deleted portfolio';

        $result = [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
