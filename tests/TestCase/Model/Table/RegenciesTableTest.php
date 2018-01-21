<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegenciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegenciesTable Test Case
 */
class RegenciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegenciesTable
     */
    public $Regencies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.regencies',
        'app.states',
        'app.hierarchies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Regencies') ? [] : ['className' => RegenciesTable::class];
        $this->Regencies = TableRegistry::get('Regencies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Regencies);

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
