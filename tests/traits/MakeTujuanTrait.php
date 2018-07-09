<?php

use Faker\Factory as Faker;
use App\Models\Tujuan;
use App\Repositories\TujuanRepository;

trait MakeTujuanTrait
{
    /**
     * Create fake instance of Tujuan and save it in database
     *
     * @param array $tujuanFields
     * @return Tujuan
     */
    public function makeTujuan($tujuanFields = [])
    {
        /** @var TujuanRepository $tujuanRepo */
        $tujuanRepo = App::make(TujuanRepository::class);
        $theme = $this->fakeTujuanData($tujuanFields);
        return $tujuanRepo->create($theme);
    }

    /**
     * Get fake instance of Tujuan
     *
     * @param array $tujuanFields
     * @return Tujuan
     */
    public function fakeTujuan($tujuanFields = [])
    {
        return new Tujuan($this->fakeTujuanData($tujuanFields));
    }

    /**
     * Get fake data of Tujuan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTujuanData($tujuanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_pengirim' => $fake->word,
            'alamat_pengirim' => $fake->word,
            'no_hp_pengirim' => $fake->word,
            'barang' => $fake->word,
            'berat' => $fake->word,
            'nama_penerima' => $fake->word,
            'alamat_penerima' => $fake->word,
            'no_hp_penerima' => $fake->word,
            'longitude' => $fake->word,
            'latitude' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tujuanFields);
    }
}
