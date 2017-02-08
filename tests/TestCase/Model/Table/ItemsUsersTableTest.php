<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemsUsersTable Test Case
 */
class ItemsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemsUsersTable
     */
    public $ItemsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.items_users',
        'app.items',
        'app.info_items',
        'app.item_types',
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
        $config = TableRegistry::exists('ItemsUsers') ? [] : ['className' => 'App\Model\Table\ItemsUsersTable'];
        $this->ItemsUsers = TableRegistry::get('ItemsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemsUsers);

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
