<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Media Entity
 *
 * @property int $id
 * @property int $post_id
 * @property string $url
 * @property int $width
 * @property int $height
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $category
 * @property bool $active
 *
 * @property \App\Model\Entity\Post $post
 * @property \App\Model\Entity\Type $type
 */
class Media extends Entity
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
        'post_id' => true,
        'url' => true,
        'width' => true,
        'height' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'active' => true,
        'post' => true,
        'type' => true
    ];
}
