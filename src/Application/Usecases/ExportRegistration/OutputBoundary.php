<?php

declare(strict_types=1);

namespace App\Application\Usecases\ExportRegistration;

final class OutputBoundary
{

    private string $fullFilename;

    public function __construct(string $fullFilename){
        $this->fullFilename = $fullFilename;
    }

    public function getFullFilename(): string
    {
        return $this->fullFilename;
    }

    // private string $name;
    // private string $email;
    // private string $birthDate;
    // private string $registrationNumber;
    // private string $registrationAt;

    // public function __construct(array $values)
    // {
    //     $this->name = $values['name'] ?? '';
    //     $this->email = $values['email'] ?? '';
    //     $this->birthDate = $values['birthDate'] ?? '';
    //     $this->registrationNumber = $values['registrationNumber'] ?? '';
    //     $this->registrationAt = $values['registrationAt'] ?? '';
    // }

    // public function getName(): string
    // {
    //     return $this->name;
    // }

    // public function getEmail(): string
    // {
    //     return $this->email;
    // }

    // public function getBirthDate(): string
    // {
    //     return $this->birthDate;
    // }

    // public function getRegistrationNumber(): string
    // {
    //     return $this->registrationNumber;
    // }

    // public function getRegistrationAt(): string
    // {
    //     return $this->registrationAt;
    // }
}
