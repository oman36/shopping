<?php


use Phinx\Seed\AbstractSeed;

class Types extends AbstractSeed
{
    /**
     * Migrate Up.
     */
    public function run()
    {
        // inserting multiple rows
        $this->table('types')->truncate();
        
        $rows = [
            [
                'id'    => 1,
                'name'  => 'Холодильник',
                'created_at' => '2018-03-02 18:43:21',
                'updated_at' => '2018-03-02 18:43:21',
            ],
            [
                'id'    => 2,
                'name'  => 'Варочная панель',
                'created_at' => '2018-03-02 18:43:21',
                'updated_at' => '2018-03-02 18:43:21',
            ],
            [
                'id'    => 3,
                'name'  => 'Стиральная машина',
                'created_at' => '2018-03-02 18:43:21',
                'updated_at' => '2018-03-02 18:43:21',
            ],
        ];

        $this->insert('types', $rows);
    }
}
