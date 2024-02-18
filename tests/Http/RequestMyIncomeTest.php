<?php

namespace Tests\Http;

use Firebed\AadeMyData\Exceptions\MyDataException;
use Firebed\AadeMyData\Http\MyDataRequest;
use Firebed\AadeMyData\Http\RequestMyIncome;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class RequestMyIncomeTest extends MyDataHttpTestCase
{
    /**
     * @throws MyDataException
     */
    public function test_my_income_is_received()
    {
        MyDataRequest::setHandler(new MockHandler([
            new Response(200, body: $this->getStub('request-my-income-response')),
        ]));

        $request = new RequestMyIncome();
        $bookInfo = $request->handle('01/01/2024', '31/12/2024');

        $this->assertCount(11, $bookInfo->getBookInfo());
    }
}