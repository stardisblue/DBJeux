<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsUsersFixture
 *
 */
class ItemsUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'item_id' => ['autoIncrement' => null, 'type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'date_begin' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'date_end' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'borrowed_status_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['item_id', 'user_id'], 'length' => []],
            'sqlite_autoindex_items_users_1' => ['type' => 'unique', 'columns' => ['item_id', 'user_id'], 'length' => []],
            'borrowed_status_id_fk' => ['type' => 'foreign', 'columns' => ['borrowed_status_id'], 'references' => ['borrowed_status', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'user_id_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'item_id_fk' => ['type' => 'foreign', 'columns' => ['item_id'], 'references' => ['items', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'item_id' => 1,
            'user_id' => 1,
            'date_begin' => '2017-02-08',
            'date_end' => '2017-02-08',
            'borrowed_status_id' => 1
        ],
    ];
}
