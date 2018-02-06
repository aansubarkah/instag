<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesTable Test Case
 */
class TypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesTable
     */
    public $Types;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types',
        'app.media',
        'app.posts',
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
        'app.vassals',
        'app.idols',
        'app.followers',
        'app.henchmans',
        'app.loves',
        'app.locations',
        'app.comments',
        'app.messages',
        'app.activities',
        'app.likes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Types') ? [] : ['className' => TypesTable::class];
        $this->Types = TableRegistry::get('Types', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Types);

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
