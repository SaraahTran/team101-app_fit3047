<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property string $job_desc
 * @property float $job_price
 * @property \Cake\I18n\FrozenTime $job_time
 * @property int $job_duration
 */
class Job extends Entity
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
        'job_name' => true,
        'job_desc' => true,
        'job_price' => true,
        'job_time' => true,
        'job_duration' => true,
        'job_status' => true,
    ];
}
