<?php


use Phinx\Migration\AbstractMigration;

class Shops extends AbstractMigration
{

    /**
     * @return void
     */
    public function up(): void
    {
        $this
            ->table('shops')
            ->addColumn('name', 'string', [ 'length' => 255, 'collation' => 'utf8_general_ci' ])
            ->addTimestamps()
            ->create();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this
            ->table('shops')
            ->drop();
    }
}
