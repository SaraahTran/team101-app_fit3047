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
                'items_name' => 'Lorem ipsum dolor sit amet',
                'items_desc' => 'Lorem ipsum dolor sit amet',
                'items_type' => 'Lorem ipsum dolor sit amet',
                'items_price' => 1,
            ],
        ];
        parent::init();
    }
}
