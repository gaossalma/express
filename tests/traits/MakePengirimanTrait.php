<?php

use Faker\Factory as Faker;
use App\Models\Pengiriman;
use App\Repositories\PengirimanRepository;

trait MakePengirimanTrait
{
    /**
     * Create fake instance of Pengiriman and save it in database
     *
     * @param array $pengirimanFields
     * @return Pengiriman
     */
    public function makePengiriman($pengirimanFields = [])
    {
        /** @var PengirimanRepository $pengirimanRepo */
        $pengirimanRepo = App::make(PengirimanRepository::class);
        $theme = $this->fakePengirimanData($pengirimanFields);
        return $pengirimanRepo->create($theme);
    }

    /**
     * Get fake instance of Pengiriman
     *
     * @param array $pengirimanFields
     * @return Pengiriman
     */
    public function fakePengiriman($pengirimanFields = [])
    {
        return new Pengiriman($this->fakePengirimanData($pengirimanFields));
    }

    /**
     * Get fake data of Pengiriman
     *
     * @param array $postFields
     * @return array
     */
    public function fakePengirimanData($pengirimanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_tujuan' => $fake->randomDigitNotNull,
            'id_kurir' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pengirimanFields);
    }
}
