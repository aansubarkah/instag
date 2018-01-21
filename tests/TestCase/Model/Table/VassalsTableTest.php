<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VassalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VassalsTable Test Case
 */
class VassalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VassalsTable
     */
    public $Vassals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vassals',
        'app.accounts',
        'app.users',
        'app.hates',
        'app.targets',
        'app.fans',
        'app.accountlists',
        'app.projects',
        'app.plans',
        'app.proxies',
        'app.hashtaglists',
        'app.hashtags',
        'app.proposals',
        'app.idols',
        'app.followers',
        'app.henchmans',
        'app.loves',
        'app.posts',
        'app.locations',
        'app.comments',
        'app.likes',
        'app.media',
        'app.messages',
        'app.activities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vassals') ? [] : ['className' => VassalsTable::class];
        $this->Vassals = TableRegistry::get('Vassals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vassals);

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
