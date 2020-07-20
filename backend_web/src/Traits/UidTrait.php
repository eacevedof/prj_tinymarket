<?php

namespace App\Traits;
use Ramsey\Uuid\Uuid;

trait UidTrait
{
    public static function getUuid(): string
    {
        return Uuid::uuid4()->toString();
    }

}//UidTrait