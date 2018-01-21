<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HatesTable Test Case
 */
class HatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HatesTable
     */
    public $Hates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hates',
        'app.targets',
        'app.projects',
        'app.accounts',
        'app.users',
        'app.accountlists',
        'app.fans',
        'app.idols',
        'app.vassals',
        'app.activities',
        'app.comments',
        'app.posts',
        'app.loves',
        'app.followers',
        'app.henchmans',
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
        $config = TableRegistry::exists('Hates') ? [] : ['className' => HatesTable::class];
        $this->Hates = TableRegistry::get('Hates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hates);

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
