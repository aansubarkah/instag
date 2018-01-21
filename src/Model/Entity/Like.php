<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Like Entity
 *
 * @property int $id
 * @property int $post_id
 * @property int $account_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $unlike
 * @property bool $who
 * @property bool $active
 *
 * @property \App\Model\Entity\Post $post
 * @property \App\Model\Entity\Account $account
 */
class Like extends Entity
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
        'account_id' => true,
        'created' => true,
        'modified' => true,
        'unlike' => true,
        'who' => true,
        'active' => true,
        'post' => true,
        'account' => true
    ];
}
