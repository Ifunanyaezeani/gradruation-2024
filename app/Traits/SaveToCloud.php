<?php

namespace App\Traits;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

trait SaveToCloud
{

    /**
     * upload verification file to cloudinary
     * @return url String of file
     */
    private function cloudinary($fileable): string
    {
        // $uploadedFileUrl = Cloudinary::upload($req->file($fileable)->getRealPath())->getSecurePath();
        $uploadedFileUrl = Cloudinary::upload($fileable->getRealPath())->getSecurePath();
        return $uploadedFileUrl;
    }

    private function cloudinaryFile($req, String $fileable): string
    {
        // Upload any File to Cloudinary with One line of Code
        $uploadedFileUrl = Cloudinary::uploadFile($req->file($fileable)->getRealPath())->getSecurePath();
        return $uploadedFileUrl;
    }
}
