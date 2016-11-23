<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InfoObjectsFixture
 *
 */
class InfoObjectsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'object_type_id' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => 'book', 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'isbn' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'price' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'nsfw' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => 'FALSE', 'precision' => null, 'comment' => null],
        'author' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'object_type_id_fk' => ['type' => 'foreign', 'columns' => ['object_type_id'], 'references' => ['object_types', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'object_type_id' => 'Lorem ipsum dolor ',
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet',
            'isbn' => 1,
            'price' => 1,
            'nsfw' => 1,
            'author' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
