<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObjectTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObjectTypesTable Test Case
 */
class ObjectTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ObjectTypesTable
     */
    public $ObjectTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.object_types',
        'app.info_objects',
        'app.objects',
        'app.users',
        'app.objects_users',
        'app.borrowed_status',
        'app.item_states'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ObjectTypes') ? [] : ['className' => 'App\Model\Table\ObjectTypesTable'];
        $this->ObjectTypes = TableRegistry::get('ObjectTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ObjectTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
