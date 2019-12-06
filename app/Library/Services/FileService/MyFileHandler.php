<?php
namespace App\Library\Services\FileService;

use  App\Library\Services\FileService\MyFileHandlerInterface;
use App\UploadFile;
use Illuminate\Support\Facades\Storage;
class MyFileHandler implements MyFileHandlerInterface
{
    public function loadf()
    {

    }

    public function storef($file)
    {
      $mypath = $file->store('public/photos');
      return $mypath;
    }
}
