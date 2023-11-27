<?php

declare(strict_types=1);

namespace App\Application\Usecases\ExportRegistration;

use App\Application\Contracts\ExportRegistrationPDFExporter;
use App\Application\Contracts\Storage;
use App\Domain\Repository\LoadRegistrationRepository;
use App\Domain\ValueObjects\Cpf;

final class ExportRegistration
{

    private LoadRegistrationRepository $repository;
    private ExportRegistrationPDFExporter $pdfExporter;
    private Storage $storage;

    public function __construct(
        LoadRegistrationRepository $repository,
        ExportRegistrationPDFExporter $pdfExporter,
        Storage $storage
    ) {
        $this->repository = $repository;
        $this->pdfExporter = $pdfExporter;
        $this->storage = $storage;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $cpf = new Cpf($input->getRegistrationNumber());
        $registration = $this->repository->loadByRegistrationNumber($cpf);


        $fileContent = $this->pdfExporter->generate($registration);
        $this->storage->store($input->getPdfFilename(), $input->getPath(), $fileContent);

        $fullFilename = $input->getPath().DIRECTORY_SEPARATOR.$input->getPdfFilename();

        return new OutputBoundary($fullFilename);
    }
}