<?php

use App\Application\Usecases\ExportRegistration\ExportRegistration;
use App\Application\Usecases\ExportRegistration\InputBoundary;
use App\Domain\Entities\Registration;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Infra\Adapters\Html2PdfAdapter;
use App\Infra\Adapters\LocalStorageAdapter;
use App\Infra\Repositories\MySQL\PdoRegistrationRepository;

require_once __DIR__.'/../vendor/autoload.php';

$appConfig = require_once __DIR__.'/../config/app.php';

$dsn = "mysql:host={$appConfig['db']['host']};port={$appConfig['db']['port']};dbname={$appConfig['db']['dbname']};charset={$appConfig['db']['charset']}";

$pdo = new PDO($dsn, $appConfig['db']['username'], $appConfig['db']['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_PERSISTENT => true
]);

$repository = new PdoRegistrationRepository($pdo);
$pdfExporter = new Html2PdfAdapter();
$storage = new LocalStorageAdapter();

$entity = $repository->loadByRegistrationNumber(new Cpf('70259789496'));

// $content = $pdfExporter->generate($registration);
// $storage->store('test.pdf',__DIR__.'/../storage/registrations', $content);



// $exportRegistrationUseCase = new ExportRegistration($repository, $pdfExporter, $storage);
// $inputBoundary = new InputBoundary('660.210.800-09', 'registration', __DIR__.'/../storage');
// $outputBoundary = $exportRegistrationUseCase->handle($inputBoundary);

