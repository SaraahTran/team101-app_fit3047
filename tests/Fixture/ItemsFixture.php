<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsFixture
 */
class ItemsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'item_quantity' => 1,
                'item_price' => 1,
                'quantity_threshold' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'category_id' => 1,
            ],
        ];
        parent::init();
    }
}
