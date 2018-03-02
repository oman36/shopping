<?php


use Phinx\Migration\AbstractMigration;

class Types extends AbstractMigration
{

    /**
     * @return void
     */
    public function up(): void
    {
        $this
            ->table('types')
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
            ->table('types')
            ->drop();
    }
}
