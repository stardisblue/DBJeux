<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObjectsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObjectsUsersTable Test Case
 */
class ObjectsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ObjectsUsersTable
     */
    public $ObjectsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.objects_users',
        'app.objects',
        'app.info_objects',
        'app.object_types',
        'app.users',
        'app.item_states',
        'app.borrowed_status'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ObjectsUsers') ? [] : ['className' => 'App\Model\Table\ObjectsUsersTable'];
        $this->ObjectsUsers = TableRegistry::get('ObjectsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ObjectsUsers);

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
