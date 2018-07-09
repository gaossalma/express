<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TujuanApiTest extends TestCase
{
    use MakeTujuanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTujuan()
    {
        $tujuan = $this->fakeTujuanData();
        $this->json('POST', '/api/v1/tujuans', $tujuan);

        $this->assertApiResponse($tujuan);
    }

    /**
     * @test
     */
    public function testReadTujuan()
    {
        $tujuan = $this->makeTujuan();
        $this->json('GET', '/api/v1/tujuans/'.$tujuan->id);

        $this->assertApiResponse($tujuan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTujuan()
    {
        $tujuan = $this->makeTujuan();
        $editedTujuan = $this->fakeTujuanData();

        $this->json('PUT', '/api/v1/tujuans/'.$tujuan->id, $editedTujuan);

        $this->assertApiResponse($editedTujuan);
    }

    /**
     * @test
     */
    public function testDeleteTujuan()
    {
        $tujuan = $this->makeTujuan();
        $this->json('DELETE', '/api/v1/tujuans/'.$tujuan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tujuans/'.$tujuan->id);

        $this->assertResponseStatus(404);
    }
}
