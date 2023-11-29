<?php

use App\Application\Usecases\ExportRegistration\ExportRegistration;
use App\Application\Usecases\ExportRegistration\InputBoundary;
use App\Domain\Entities\Registration;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Infra\Adapters\Html2PdfAdapter;
use App\Infra\Adapters\LocalStorageAdapter;

require_once __DIR__.'/../vendor/autoload.php';

//* Entities

$registration = new Registration();

$registration->setName('Leonardo Anthony')
    ->setBirthDate(new DateTimeImmutable('2000-01-01'))
    ->setEmail(new Email('leonardoanthony.dev@gmail.com'))
    ->setRegistrationAt(new DateTimeImmutable())
    ->setRegistrationNumber(new Cpf('660.210.800-09'));
;

//* Usecases

$repository = new stdClass();
$pdfExporter = new Html2PdfAdapter();
$storage = new LocalStorageAdapter();

$content = $pdfExporter->generate($registration);
$storage->store('test.pdf',__DIR__.'/../storage/registrations', $content);

die();


$exportRegistrationUseCase = new ExportRegistration($repository, $pdfExporter, $storage);
$inputBoundary = new InputBoundary('660.210.800-09', 'registration', __DIR__.'/../storage');
$outputBoundary = $exportRegistrationUseCase->handle($inputBoundary);

