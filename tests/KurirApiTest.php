<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KurirApiTest extends TestCase
{
    use MakeKurirTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKurir()
    {
        $kurir = $this->fakeKurirData();
        $this->json('POST', '/api/v1/kurirs', $kurir);

        $this->assertApiResponse($kurir);
    }

    /**
     * @test
     */
    public function testReadKurir()
    {
        $kurir = $this->makeKurir();
        $this->json('GET', '/api/v1/kurirs/'.$kurir->id);

        $this->assertApiResponse($kurir->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKurir()
    {
        $kurir = $this->makeKurir();
        $editedKurir = $this->fakeKurirData();

        $this->json('PUT', '/api/v1/kurirs/'.$kurir->id, $editedKurir);

        $this->assertApiResponse($editedKurir);
    }

    /**
     * @test
     */
    public function testDeleteKurir()
    {
        $kurir = $this->makeKurir();
        $this->json('DELETE', '/api/v1/kurirs/'.$kurir->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kurirs/'.$kurir->id);

        $this->assertResponseStatus(404);
    }
}
