<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $items_name
 * @property string $items_desc
 * @property string $items_type
 * @property float $items_price
 *
 * @property \App\Model\Entity\Order[] $orders
 */
class Item extends Entity
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
        'items_name' => true,
        'items_desc' => true,
        'items_type' => true,
        'items_price' => true,
        'orders' => true,
    ];
}
