<?php


use Phinx\Migration\AbstractMigration;

class Items extends AbstractMigration
{

    /**
     * @return void
     */
    public function up(): void
    {
        $this
            ->table('items')
            ->addColumn('name', 'string', [ 'length' => 255, 'collation' => 'utf8_general_ci' ])
            ->addColumn('url', 'string', [ 'length' => 255, 'collation' => 'utf8_general_ci' ])
            ->addColumn('shop_id', 'integer', [ 'null' => false ])
            ->addColumn('type_id', 'integer', [ 'null' => false ])
            ->addColumn('price', 'float', [ 'null' => false ])
            ->addColumn('cashback', 'float', [ 'null' => false, 'default' => 0 ])
            ->addColumn('comment', 'text')
            ->addTimestamps()
            ->create();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this
            ->table('items')
            ->drop();
    }
}
