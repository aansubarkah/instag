<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int $account_id
 * @property int $location_id
 * @property int $pk
 * @property float $lat
 * @property float $lng
 * @property int $takenat
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Like[] $likes
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Love[] $loves
 * @property \App\Model\Entity\Media[] $media
 */
class Post extends Entity
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
        'account_id' => true,
        'location_id' => true,
        'pk' => true,
        'lat' => true,
        'lng' => true,
        'likes' => true,
        'comments' => true,
        'takenat' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'account' => true,
        'location' => true,
        'loves' => true,
        'media' => true
    ];
}
