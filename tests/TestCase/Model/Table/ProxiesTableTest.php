<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProxiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProxiesTable Test Case
 */
class ProxiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProxiesTable
     */
    public $Proxies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.proxies',
        'app.projects',
        'app.users',
        'app.accounts',
        'app.accountlists',
        'app.fans',
        'app.targets',
        'app.idols',
        'app.vassals',
        'app.activities',
        'app.comments',
        'app.posts',
        'app.locations',
        'app.loves',
        'app.likes',
        'app.media',
        'app.followers',
        'app.hates',
        'app.henchmans',
        'app.messages',
        'app.proposals',
        'app.plans',
        'app.hashtaglists',
        'app.hashtags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Proxies') ? [] : ['className' => ProxiesTable::class];
        $this->Proxies = TableRegistry::get('Proxies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Proxies);

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
