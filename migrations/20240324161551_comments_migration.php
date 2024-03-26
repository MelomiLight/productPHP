<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CommentsMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $comments_table = $this->table('comments', ['id' => false, 'primary_key' => ['id']]);

        $comments_table
            ->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('product_id', 'biginteger', ['null' => true])
            ->addColumn('body', 'text', ['null' => true])
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'NO ACTION'])
            ->create();
    }
}
