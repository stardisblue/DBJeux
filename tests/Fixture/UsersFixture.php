<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'id_card' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'firstname' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'lastname' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'username' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'password' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'role' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => 'user', 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'email' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'sqlite_autoindex_users_2' => ['type' => 'unique', 'columns' => ['username'], 'length' => []],
            'sqlite_autoindex_users_1' => ['type' => 'unique', 'columns' => ['id_card'], 'length' => []],
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
            'id_card' => 1,
            'firstname' => 'Lorem ipsum dolor sit amet',
            'lastname' => 'Lorem ipsum dolor sit amet',
            'username' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'role' => 'Lorem ipsum dolor ',
            'email' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
