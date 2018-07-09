<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PengirimanApiTest extends TestCase
{
    use MakePengirimanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePengiriman()
    {
        $pengiriman = $this->fakePengirimanData();
        $this->json('POST', '/api/v1/pengirimen', $pengiriman);

        $this->assertApiResponse($pengiriman);
    }

    /**
     * @test
     */
    public function testReadPengiriman()
    {
        $pengiriman = $this->makePengiriman();
        $this->json('GET', '/api/v1/pengirimen/'.$pengiriman->id);

        $this->assertApiResponse($pengiriman->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePengiriman()
    {
        $pengiriman = $this->makePengiriman();
        $editedPengiriman = $this->fakePengirimanData();

        $this->json('PUT', '/api/v1/pengirimen/'.$pengiriman->id, $editedPengiriman);

        $this->assertApiResponse($editedPengiriman);
    }

    /**
     * @test
     */
    public function testDeletePengiriman()
    {
        $pengiriman = $this->makePengiriman();
        $this->json('DELETE', '/api/v1/pengirimen/'.$pengiriman->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pengirimen/'.$pengiriman->id);

        $this->assertResponseStatus(404);
    }
}
