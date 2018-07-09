<?php

use App\Models\Tujuan;
use App\Repositories\TujuanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TujuanRepositoryTest extends TestCase
{
    use MakeTujuanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TujuanRepository
     */
    protected $tujuanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tujuanRepo = App::make(TujuanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTujuan()
    {
        $tujuan = $this->fakeTujuanData();
        $createdTujuan = $this->tujuanRepo->create($tujuan);
        $createdTujuan = $createdTujuan->toArray();
        $this->assertArrayHasKey('id', $createdTujuan);
        $this->assertNotNull($createdTujuan['id'], 'Created Tujuan must have id specified');
        $this->assertNotNull(Tujuan::find($createdTujuan['id']), 'Tujuan with given id must be in DB');
        $this->assertModelData($tujuan, $createdTujuan);
    }

    /**
     * @test read
     */
    public function testReadTujuan()
    {
        $tujuan = $this->makeTujuan();
        $dbTujuan = $this->tujuanRepo->find($tujuan->id);
        $dbTujuan = $dbTujuan->toArray();
        $this->assertModelData($tujuan->toArray(), $dbTujuan);
    }

    /**
     * @test update
     */
    public function testUpdateTujuan()
    {
        $tujuan = $this->makeTujuan();
        $fakeTujuan = $this->fakeTujuanData();
        $updatedTujuan = $this->tujuanRepo->update($fakeTujuan, $tujuan->id);
        $this->assertModelData($fakeTujuan, $updatedTujuan->toArray());
        $dbTujuan = $this->tujuanRepo->find($tujuan->id);
        $this->assertModelData($fakeTujuan, $dbTujuan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTujuan()
    {
        $tujuan = $this->makeTujuan();
        $resp = $this->tujuanRepo->delete($tujuan->id);
        $this->assertTrue($resp);
        $this->assertNull(Tujuan::find($tujuan->id), 'Tujuan should not exist in DB');
    }
}
