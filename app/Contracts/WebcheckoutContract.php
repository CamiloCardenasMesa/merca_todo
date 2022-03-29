<?php

namespace App\Contracts;

interface WebcheckoutContract
{
    public function getInformation(?int $session_id);

    public function createSession(array $data);
}
