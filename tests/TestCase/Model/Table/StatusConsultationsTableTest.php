<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusConsultationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusConsultationsTable Test Case
 */
class StatusConsultationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StatusConsultationsTable
     */
    public $StatusConsultations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.status_consultations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StatusConsultations') ? [] : ['className' => 'App\Model\Table\StatusConsultationsTable'];
        $this->StatusConsultations = TableRegistry::get('StatusConsultations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StatusConsultations);

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
