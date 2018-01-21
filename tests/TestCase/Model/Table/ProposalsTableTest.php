<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProposalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProposalsTable Test Case
 */
class ProposalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProposalsTable
     */
    public $Proposals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.proposals',
        'app.accounts',
        'app.users',
        'app.accountlists',
        'app.projects',
        'app.plans',
        'app.proxies',
        'app.fans',
        'app.targets',
        'app.idols',
        'app.hashtaglists',
        'app.hashtags',
        'app.hates',
        'app.vassals',
        'app.activities',
        'app.comments',
        'app.posts',
        'app.locations',
        'app.loves',
        'app.likes',
        'app.media',
        'app.followers',
        'app.henchmans',
        'app.messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Proposals') ? [] : ['className' => ProposalsTable::class];
        $this->Proposals = TableRegistry::get('Proposals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Proposals);

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
