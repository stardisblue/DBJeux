<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ObjectsUsersFixture
 *
 */
class ObjectsUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'object_id' => ['autoIncrement' => null, 'type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'date_begin' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'date_end' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'borrowed_status_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['object_id', 'user_id'], 'length' => []],
            'sqlite_autoindex_objects_users_1' => ['type' => 'unique', 'columns' => ['object_id', 'user_id'], 'length' => []],
            'borrowed_status_id_fk' => ['type' => 'foreign', 'columns' => ['borrowed_status_id'], 'references' => ['borrowed_status', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'user_id_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'object_id_fk' => ['type' => 'foreign', 'columns' => ['object_id'], 'references' => ['objects', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'object_id' => 1,
            'user_id' => 1,
            'date_begin' => '2017-02-05',
            'date_end' => '2017-02-05',
            'borrowed_status_id' => 1
        ],
    ];
}
