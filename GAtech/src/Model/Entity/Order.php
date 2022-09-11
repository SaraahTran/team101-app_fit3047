<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $orders_desc
 * @property int $custs_id
 * @property int $items_quantity
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Quote[] $quotes
 * @property \App\Model\Entity\Item[] $items
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'orders_desc' => true,
        'custs_id' => true,
        'items_quantity' => true,
        'customer' => true,
        'invoices' => true,
        'quotes' => true,
        'items' => true,
    ];
}
