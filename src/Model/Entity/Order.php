<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property float $total
 * @property int $customer_id
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
        'date' => true,
        'total' => true,
        'customer_id' => true,
        'customer' => true,
        'invoices' => true,
        'quotes' => true,
        'items' => true,
    ];
}
