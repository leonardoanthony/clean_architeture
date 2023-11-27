<?php

declare(strict_types=1);

namespace App\Application\Usecases\ExportRegistration;

final class InputBoundary
{
    private string $registrationNumber;
    private string $pdfFilename;
    private string $path;

    public function __construct(string $registrationNumber, string $pdfFilename, string $path) 
    {
        $this->registrationNumber = $registrationNumber;
        $this->pdfFilename = $pdfFilename;
        $this->path = $path;
    }

     public function getRegistrationNumber(): string
     {
         return $this->registrationNumber;
     }

     public function getPdfFilename(): string
     {
         return $this->pdfFilename;
     }

     public function getPath(): string
     {
         return $this->path;
     }
}