<?php

namespace App\Contracts;

interface WebCheckoutRequestContract
{
    public static function url(?int $session_id): string;
}
