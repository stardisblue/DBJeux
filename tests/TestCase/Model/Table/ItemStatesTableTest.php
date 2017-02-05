<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemStatesTable Test Case
 */
class ItemStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemStatesTable
     */
    public $ItemStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_states',
        'app.objects',
        'app.info_objects',
        'app.object_types',
        'app.users',
        'app.objects_users',
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
        $config = TableRegistry::exists('ItemStates') ? [] : ['className' => 'App\Model\Table\ItemStatesTable'];
        $this->ItemStates = TableRegistry::get('ItemStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemStates);

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
