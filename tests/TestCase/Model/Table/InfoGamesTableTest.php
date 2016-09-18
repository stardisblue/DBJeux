<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InfoGamesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InfoGamesTable Test Case
 */
class InfoGamesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InfoGamesTable
     */
    public $InfoGames;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.info_games',
        'app.games',
        'app.users',
        'app.books',
        'app.info_books',
        'app.books_users',
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
        $config = TableRegistry::exists('InfoGames') ? [] : ['className' => 'App\Model\Table\InfoGamesTable'];
        $this->InfoGames = TableRegistry::get('InfoGames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InfoGames);

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
