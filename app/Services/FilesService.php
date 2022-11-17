<?php

namespace App\Services;


class FilesService
{

    /**
     * Validates the file coming from the request & persists it into storage
     * @param String $fileName combing from request
     * @param String $folder
     * @param String $disk
     * @return Sting $filePath
     */
    public static function upload($fileName = null, $folder = '', $disk = 'public')
    {
        if (request()->hasFile($fileName) && request()->file($fileName)->isValid()) {
            // dd('yes');
            $file = request()->file($fileName)->store($folder, $disk);
            return 'storage/' . $file;
        }
    }
}
