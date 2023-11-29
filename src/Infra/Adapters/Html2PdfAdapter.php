<?php 

declare(strict_types=1);

namespace App\Infra\Adapters;

use App\Application\Contracts\ExportRegistrationPDFExporter;
use App\Domain\Entities\Registration;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

final class Html2PdfAdapter implements ExportRegistrationPDFExporter
{
    public function generate(Registration $registration): string
    {
        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        try {
        
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML(
                "<p>Nome:{$registration->getName()}</p>
                <p>{$registration->getRegistrationNumber()}</p>
                ");
            return $html2pdf->output('', 'S');
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
        
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        };

        return '';
    }
}

