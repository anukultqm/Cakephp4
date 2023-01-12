<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentrecordTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentrecordTable Test Case
 */
class StudentrecordTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentrecordTable
     */
    protected $Studentrecord;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Studentrecord',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Studentrecord') ? [] : ['className' => StudentrecordTable::class];
        $this->Studentrecord = $this->getTableLocator()->get('Studentrecord', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Studentrecord);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StudentrecordTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
