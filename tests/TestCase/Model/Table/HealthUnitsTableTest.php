<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HealthUnitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HealthUnitsTable Test Case
 */
class HealthUnitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HealthUnitsTable
     */
    public $HealthUnits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.health_units',
        'app.districts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HealthUnits') ? [] : ['className' => 'App\Model\Table\HealthUnitsTable'];
        $this->HealthUnits = TableRegistry::get('HealthUnits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HealthUnits);

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
