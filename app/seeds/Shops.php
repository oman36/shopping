<?php


use Phinx\Seed\AbstractSeed;

class Shops extends AbstractSeed
{
    /**
     * Migrate Up.
     */
    public function run()
    {
        // inserting multiple rows
        $this->table('shops')->truncate();

        $rows = [
            [
                'id'    => 1,
                'name'  => 'MediaMarkt',
                'created_at' => '2018-03-02 18:43:21',
                'updated_at' => '2018-03-02 18:43:21',
            ],
            [
                'id'    => 2,
                'name'  => 'Mvideo',
                'created_at' => '2018-03-02 18:43:21',
                'updated_at' => '2018-03-02 18:43:21',
            ],
            [
                'id'    => 3,
                'name'  => 'Eldorado',
                'created_at' => '2018-03-02 18:43:21',
                'updated_at' => '2018-03-02 18:43:21',
            ],
        ];

        $this->insert('shops', $rows);
    }
}
