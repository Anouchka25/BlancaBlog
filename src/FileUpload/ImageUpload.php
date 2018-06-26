<?php
/**
 * Created by PhpStorm.
 * User: Anouchka
 * Date: 26/06/2018
 * Time: 12:58
 */

namespace App\FileUpload;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUpload
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDirectory(), $fileName);

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}
