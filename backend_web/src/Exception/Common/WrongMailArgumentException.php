<?php
declare(strict_types=1);

namespace App\Exception\Common;

//use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Mime\Exception\RfcComplianceException;

class WrongMailArgumentException extends RfcComplianceException
{
    private const MESSAGE = 'You cannot add another user as owner of this resource';

    public static function create(): self
    {
        throw new self(self::MESSAGE);
    }
}