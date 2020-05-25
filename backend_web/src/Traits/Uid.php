<?php

namespace App\Traits;
use Ramsey\Uuid\Uuid;

trait Uid
{
    public static function getUuid(): string
    {
        return Uuid::uuid4()->toString();
    }

}//Uid