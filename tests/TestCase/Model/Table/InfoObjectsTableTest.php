<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InfoObjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InfoObjectsTable Test Case
 */
class InfoObjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InfoObjectsTable
     */
    public $InfoObjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.info_objects',
        'app.object_types',
        'app.objects',
        'app.users',
        'app.objects_users',
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
        $config = TableRegistry::exists('InfoObjects') ? [] : ['className' => 'App\Model\Table\InfoObjectsTable'];
        $this->InfoObjects = TableRegistry::get('InfoObjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InfoObjects);

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
