<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LovesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LovesTable Test Case
 */
class LovesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LovesTable
     */
    public $Loves;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loves',
        'app.accounts',
        'app.users',
        'app.accountlists',
        'app.projects',
        'app.fans',
        'app.targets',
        'app.idols',
        'app.vassals',
        'app.activities',
        'app.comments',
        'app.posts',
        'app.followers',
        'app.hates',
        'app.henchmans',
        'app.likes',
        'app.messages',
        'app.proposals',
        'app.locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Loves') ? [] : ['className' => LovesTable::class];
        $this->Loves = TableRegistry::get('Loves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loves);

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
