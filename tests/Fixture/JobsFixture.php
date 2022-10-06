<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JobsFixture
 */
class JobsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'job_name' => 'ro',
                'job_desc' => 'Lorem ipsum dolor sit amet',
                'job_price' => 1,
                'job_time' => '2022-09-17 02:43:45',
                'job_duration' => 1,
                'job_status' => 0,
            ],
        ];
        parent::init();
    }
}
