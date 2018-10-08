<?php
/**
 * Created by PhpStorm.
 * User: lemaitre
 * Date: 2018/10/3
 * Time: 4:54 PM
 */

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FileUploader
{

    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @return string
     */
    public function upload(UploadedFile $uploadedFile)
    {
        if($uploadedFile->getExtension() === '') {
            $fileName = '';
        } else {
            $fileName = md5(uniqid()) . '.' . $uploadedFile->getExtension();
        }


        try {
            $uploadedFile->move($this->getTargetDirectory(), $fileName);
        }catch (FileException $exception) {
            return $exception->getMessage();
        }

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}