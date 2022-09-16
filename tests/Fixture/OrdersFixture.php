<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'orders_desc' => 'Lorem ipsum dolor sit amet',
                'custs_id' => 1,
                'order_total' => 1,
            ],
        ];
        parent::init();
    }
}
