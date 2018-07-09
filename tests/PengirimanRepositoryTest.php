<?php

use App\Models\Pengiriman;
use App\Repositories\PengirimanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PengirimanRepositoryTest extends TestCase
{
    use MakePengirimanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PengirimanRepository
     */
    protected $pengirimanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pengirimanRepo = App::make(PengirimanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePengiriman()
    {
        $pengiriman = $this->fakePengirimanData();
        $createdPengiriman = $this->pengirimanRepo->create($pengiriman);
        $createdPengiriman = $createdPengiriman->toArray();
        $this->assertArrayHasKey('id', $createdPengiriman);
        $this->assertNotNull($createdPengiriman['id'], 'Created Pengiriman must have id specified');
        $this->assertNotNull(Pengiriman::find($createdPengiriman['id']), 'Pengiriman with given id must be in DB');
        $this->assertModelData($pengiriman, $createdPengiriman);
    }

    /**
     * @test read
     */
    public function testReadPengiriman()
    {
        $pengiriman = $this->makePengiriman();
        $dbPengiriman = $this->pengirimanRepo->find($pengiriman->id);
        $dbPengiriman = $dbPengiriman->toArray();
        $this->assertModelData($pengiriman->toArray(), $dbPengiriman);
    }

    /**
     * @test update
     */
    public function testUpdatePengiriman()
    {
        $pengiriman = $this->makePengiriman();
        $fakePengiriman = $this->fakePengirimanData();
        $updatedPengiriman = $this->pengirimanRepo->update($fakePengiriman, $pengiriman->id);
        $this->assertModelData($fakePengiriman, $updatedPengiriman->toArray());
        $dbPengiriman = $this->pengirimanRepo->find($pengiriman->id);
        $this->assertModelData($fakePengiriman, $dbPengiriman->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePengiriman()
    {
        $pengiriman = $this->makePengiriman();
        $resp = $this->pengirimanRepo->delete($pengiriman->id);
        $this->assertTrue($resp);
        $this->assertNull(Pengiriman::find($pengiriman->id), 'Pengiriman should not exist in DB');
    }
}
