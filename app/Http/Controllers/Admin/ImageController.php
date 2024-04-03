<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function showLogoForm()
    {
        $logo_admin = Upload::where('uploadable_type', Upload::UPLOADABLE_TYPE_LOGO['admin'])->first();
        $logo_front = Upload::where('uploadable_type', Upload::UPLOADABLE_TYPE_LOGO['front'])->first();
        return view('images.logo', compact('logo_admin', 'logo_front'));
    }

    public function uploadAndStoreLogo($request, $fileInputName, $uploadableType, $uploadableId) {
        if ($request->file($fileInputName)) {
            $this->deleteOldLogo($uploadableType);
            $file = $request->file($fileInputName);
            $fileName =  "{$fileInputName}." . $file->extension();
            $filePath = $file->storeAs('logo', $fileName, 'public');

            $data = [
                'file_path' => '/storage/' . $filePath,
                'uploadable_type' => $uploadableType,
                'uploadable_id' => $uploadableId
            ];

            Upload::create($data);
        }
    }

    public function saveLogo(Request $request) {
        $this->uploadAndStoreLogo($request, 'logo_admin', Upload::UPLOADABLE_TYPE_LOGO['admin'], 1);
        $this->uploadAndStoreLogo($request, 'logo_front', Upload::UPLOADABLE_TYPE_LOGO['front'], 2);
        return redirect()->route('logo.form');
    }

    public function deleteOldLogo($uploadableType)
    {
        $logo = Upload::where('uploadable_type', $uploadableType)->first();
        $logo->delete();
    }

}
