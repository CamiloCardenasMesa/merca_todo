<?php

namespace Tests\Feature\Webcheckout;

use App\Http\Requests\Webcheckout\CreateSessionRequest;
use App\Http\Requests\Webcheckout\GetInformationRequest;
use App\Services\WebcheckoutService;
use Tests\TestCase;

class WebcheckoutTest extends TestCase
{
    public function testItCanGetInformationRequest()
    {
        $request = (new GetInformationRequest())->auth();
        $this->assertAuthSuccess($request);
    }

    public function testItCanGetCreateSessionRequest()
    {
        $data = $this->getCreateSessionData();
        $request = (new CreateSessionRequest($data))->toArray();

        $this->assertAuthSuccess($request);

        $this->assertArrayHasKey('payment', $request);
        $this->assertArrayHasKey('expiration', $request);
        $this->assertArrayHasKey('locale', $request);
        $this->assertArrayHasKey('returnUrl', $request);
    }

    public function testItCanCreateSessionFromServiceCorrectly()
    {
        $data = $this->getCreateSessionData();

        $response = (new WebcheckoutService())->createSession($data);

        $this->assertArrayHasKey('status', $response);
        $this->assertEquals('OK', $response['status']['status']);
        $this->assertArrayHasKey('requestId', $response);
        $this->assertArrayHasKey('processUrl', $response);
    }

    private function assertAuthSuccess(array $request): void
    {
        $this->assertArrayHasKey('auth', $request);
        $this->assertArrayHasKey('login', $request['auth']);
        $this->assertArrayHasKey('tranKey', $request['auth']);
        $this->assertArrayHasKey('nonce', $request['auth']);
        $this->assertArrayHasKey('seed', $request['auth']);
    }

    private function getCreateSessionData(): array
    {
        return [
            'payment' => [
                'reference' => 'TEST_1000',
                'description' => 'Probando conexión a Webcheckout',
                'amount' => [
                    'currency' => 'COP',
                    'total' => '1000000',
                ],
            ],
            'returnUrl' => route('dashboard'),
            'expiration' => date('c', strtotime('+2 days')),
        ];
    }
}
