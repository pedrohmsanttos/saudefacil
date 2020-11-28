<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnitsSpecialtiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnitsSpecialtiesTable Test Case
 */
class UnitsSpecialtiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UnitsSpecialtiesTable
     */
    public $UnitsSpecialties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.units_specialties',
        'app.units',
        'app.districts',
        'app.doctors',
        'app.specialties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UnitsSpecialties') ? [] : ['className' => 'App\Model\Table\UnitsSpecialtiesTable'];
        $this->UnitsSpecialties = TableRegistry::get('UnitsSpecialties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UnitsSpecialties);

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
