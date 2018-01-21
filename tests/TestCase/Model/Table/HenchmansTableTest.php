<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HenchmansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HenchmansTable Test Case
 */
class HenchmansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HenchmansTable
     */
    public $Henchmans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.henchmans',
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
        'app.loves',
        'app.followers',
        'app.hates',
        'app.likes',
        'app.messages',
        'app.proposals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Henchmans') ? [] : ['className' => HenchmansTable::class];
        $this->Henchmans = TableRegistry::get('Henchmans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Henchmans);

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
