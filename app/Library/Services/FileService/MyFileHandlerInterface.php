<?php
// app/Library/Services/Contracts/CustomServiceInterface.php
namespace App\Library\Services\FileService;

Interface MyFileHandlerInterface
{
    public function loadf();
    public function storef($file);
}
