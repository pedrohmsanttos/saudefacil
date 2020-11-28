<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorsDiariesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorsDiariesTable Test Case
 */
class DoctorsDiariesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorsDiariesTable
     */
    public $DoctorsDiaries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doctors_diaries',
        'app.doctors',
        'app.units',
        'app.districts',
        'app.specialties',
        'app.units_specialties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DoctorsDiaries') ? [] : ['className' => 'App\Model\Table\DoctorsDiariesTable'];
        $this->DoctorsDiaries = TableRegistry::get('DoctorsDiaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoctorsDiaries);

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
