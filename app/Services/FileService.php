<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function uploadSingleFile(UploadedFile $file, String $folderName): array
    {
        $path = $this->getProjectPath($folderName);
        $filename = $this->generateUniqueFilename($file);

        $file->storeAs($path, $filename, 'public');
        return[
            'file_path' => "$path/$filename",
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
        ];
    }
    //Çoklu dosya yükleme metodu
    public function uploadMultipleFiles(array $files, string $projectName): array
    {
        $paths = [];

        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $paths[] = $this->uploadSingleFile($file, $projectName);
            }
        }
        return $paths;
    }


    //Sadece dosya yolu dönmek istendiğinde kullanılacak
    public function storeAndGetPath(UploadedFile $file, string $folderName): string
    {
        $path = $this->getProjectPath($folderName);
        $filename = $this->generateUniqueFileName($file);

        $file->storeAs($path, $filename, 'public');

        return "$path/$filename";
    }
    public function deleteFile(?string $filePath):bool
    {
        if(!$filePath){
            return false;
        }
        if(Storage::disk('public')->exists($filePath)){
            return Storage::disk('public')->delete($filePath);
        }
        return false;
    }

    //Klasör yolu oluşturma metodu
    private function getProjectPath(string $folderName): string
    {
        return $folderName;
    }
    //Dosya ismi oluşturma metodu
    private function generateUniqueFilename(UploadedFile $file): string
    {
        return time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    }
}
