<?php

use App\Application\Usecases\ExportRegistration\ExportRegistration;
use App\Application\Usecases\ExportRegistration\InputBoundary;
use App\Domain\Entities\Registration;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;

require_once __DIR__.'/../vendor/autoload.php';

$registration = new Registration();

$registration->setName('Leonardo Anthony')
    ->setBirthDate(new DateTimeImmutable('2000-01-01'))
    ->setEmail(new Email('leonardoanthony.dev@gmail.com'))
    ->setRegistrationAt(new DateTimeImmutable())
    ->setRegistrationNumber(new Cpf('660.210.800-09'));
;

// echo "<pre>";
// print_r($registration);
// echo "</pre>";



$exportRegistrationUseCase = new ExportRegistration();
$inputBoundary = new InputBoundary('660.210.800-09');
$outputBoundary = $exportRegistrationUseCase->handle($inputBoundary);

