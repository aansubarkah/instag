<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FansTable Test Case
 */
class FansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FansTable
     */
    public $Fans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fans',
        'app.targets',
        'app.accountlists',
        'app.accounts',
        'app.users',
        'app.activities',
        'app.comments',
        'app.posts',
        'app.loves',
        'app.followers',
        'app.hates',
        'app.henchmans',
        'app.likes',
        'app.messages',
        'app.projects',
        'app.proposals',
        'app.vassals',
        'app.idols'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fans') ? [] : ['className' => FansTable::class];
        $this->Fans = TableRegistry::get('Fans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fans);

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
