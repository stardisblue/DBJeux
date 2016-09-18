<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InfoBooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InfoBooksTable Test Case
 */
class InfoBooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InfoBooksTable
     */
    public $InfoBooks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.info_books',
        'app.books',
        'app.users',
        'app.books_users',
        'app.games',
        'app.info_games',
        'app.games_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InfoBooks') ? [] : ['className' => 'App\Model\Table\InfoBooksTable'];
        $this->InfoBooks = TableRegistry::get('InfoBooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InfoBooks);

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
}
