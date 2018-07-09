<?php

use Faker\Factory as Faker;
use App\Models\Kurir;
use App\Repositories\KurirRepository;

trait MakeKurirTrait
{
    /**
     * Create fake instance of Kurir and save it in database
     *
     * @param array $kurirFields
     * @return Kurir
     */
    public function makeKurir($kurirFields = [])
    {
        /** @var KurirRepository $kurirRepo */
        $kurirRepo = App::make(KurirRepository::class);
        $theme = $this->fakeKurirData($kurirFields);
        return $kurirRepo->create($theme);
    }

    /**
     * Get fake instance of Kurir
     *
     * @param array $kurirFields
     * @return Kurir
     */
    public function fakeKurir($kurirFields = [])
    {
        return new Kurir($this->fakeKurirData($kurirFields));
    }

    /**
     * Get fake data of Kurir
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKurirData($kurirFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'no_hp' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $kurirFields);
    }
}
