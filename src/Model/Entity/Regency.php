<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Regency Entity
 *
 * @property int $id
 * @property int $state_id
 * @property int $hierarchy_id
 * @property string $name
 * @property float $lat
 * @property float $lng
 * @property bool $active
 * @property string $alias
 * @property string $geom
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Hierarchy $hierarchy
 */
class Regency extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'state_id' => true,
        'hierarchy_id' => true,
        'name' => true,
        'lat' => true,
        'lng' => true,
        'active' => true,
        'alias' => true,
        'geom' => true,
        'state' => true,
        'hierarchy' => true
    ];
}
