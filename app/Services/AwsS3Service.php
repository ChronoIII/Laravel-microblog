<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class AwsS3Service
{
    protected $oAwsS3FileStorage;

    public function __construct() {
        $this->oAwsS3FileStorage = Storage::disk('s3');
    }

    public function exists(string $sFilePath) {
        return $this->oAwsS3FileStorage->exists($sFilePath);
    }

    public function store(string $sFilePath, $oFile) {
        try {
            return $this->oAwsS3FileStorage
                ->put($sFilePath, fopen($oFile, 'r+'), 'public');
        } catch (\Exception $e) {
            // throw S3 Exception
        }
    }

    public function delete(string $sFilePath) {
        $bIsDeleted = $this->oAwsS3FileStorage->delete($sFilePath);
        if ($bIsDeleted === false) {
            // throw S3 File Not Found
        }
        return $bIsDeleted;
    }
}
