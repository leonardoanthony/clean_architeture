<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entities\Registration;
use App\Domain\ValueObjects\Cpf;

interface LoadRegistrationRepository
{
    public function loadByRegistrationNumber(Cpf $cpf): Registration;
}