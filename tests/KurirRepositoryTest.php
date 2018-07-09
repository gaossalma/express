<?php

use App\Models\Kurir;
use App\Repositories\KurirRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KurirRepositoryTest extends TestCase
{
    use MakeKurirTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KurirRepository
     */
    protected $kurirRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kurirRepo = App::make(KurirRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKurir()
    {
        $kurir = $this->fakeKurirData();
        $createdKurir = $this->kurirRepo->create($kurir);
        $createdKurir = $createdKurir->toArray();
        $this->assertArrayHasKey('id', $createdKurir);
        $this->assertNotNull($createdKurir['id'], 'Created Kurir must have id specified');
        $this->assertNotNull(Kurir::find($createdKurir['id']), 'Kurir with given id must be in DB');
        $this->assertModelData($kurir, $createdKurir);
    }

    /**
     * @test read
     */
    public function testReadKurir()
    {
        $kurir = $this->makeKurir();
        $dbKurir = $this->kurirRepo->find($kurir->id);
        $dbKurir = $dbKurir->toArray();
        $this->assertModelData($kurir->toArray(), $dbKurir);
    }

    /**
     * @test update
     */
    public function testUpdateKurir()
    {
        $kurir = $this->makeKurir();
        $fakeKurir = $this->fakeKurirData();
        $updatedKurir = $this->kurirRepo->update($fakeKurir, $kurir->id);
        $this->assertModelData($fakeKurir, $updatedKurir->toArray());
        $dbKurir = $this->kurirRepo->find($kurir->id);
        $this->assertModelData($fakeKurir, $dbKurir->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKurir()
    {
        $kurir = $this->makeKurir();
        $resp = $this->kurirRepo->delete($kurir->id);
        $this->assertTrue($resp);
        $this->assertNull(Kurir::find($kurir->id), 'Kurir should not exist in DB');
    }
}
