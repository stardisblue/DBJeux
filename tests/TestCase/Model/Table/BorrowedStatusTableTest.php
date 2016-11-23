<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BorrowedStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BorrowedStatusTable Test Case
 */
class BorrowedStatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BorrowedStatusTable
     */
    public $BorrowedStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.borrowed_status',
        'app.objects_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BorrowedStatus') ? [] : ['className' => 'App\Model\Table\BorrowedStatusTable'];
        $this->BorrowedStatus = TableRegistry::get('BorrowedStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BorrowedStatus);

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
