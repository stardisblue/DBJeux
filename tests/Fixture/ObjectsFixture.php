<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ObjectsFixture
 *
 */
class ObjectsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'info_object_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => 'average', 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'allow_borrow' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => 'FALSE', 'precision' => null, 'comment' => null],
        'item_state_id' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'item_state_id_fk' => ['type' => 'foreign', 'columns' => ['item_state_id'], 'references' => ['item_state', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'user_id_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'info_object_id_fk' => ['type' => 'foreign', 'columns' => ['info_object_id'], 'references' => ['info_objects', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'id' => 1,
            'info_object_id' => 1,
            'user_id' => 1,
            'allow_borrow' => 1,
            'item_state_id' => 'Lorem ipsum dolor '
        ],
    ];
}
