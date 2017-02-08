<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InfoItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InfoItemsTable Test Case
 */
class InfoItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InfoItemsTable
     */
    public $InfoItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.info_items',
        'app.item_types',
        'app.items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InfoItems') ? [] : ['className' => 'App\Model\Table\InfoItemsTable'];
        $this->InfoItems = TableRegistry::get('InfoItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InfoItems);

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
