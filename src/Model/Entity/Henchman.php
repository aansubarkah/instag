<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Henchman Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $unfollow
 * @property bool $who
 * @property bool $active
 * @property int $account_id
 * @property int $account_pk
 * @property string $username
 * @property string $fullname
 * @property int $target_id
 * @property int $target_pk
 * @property string $target_username
 * @property string $target_fullname
 *
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Target $target
 */
class Henchman extends Entity
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
        'id' => true,
        'created' => true,
        'modified' => true,
        'unfollow' => true,
        'who' => true,
        'active' => true,
        'account_id' => true,
        'account_pk' => true,
        'username' => true,
        'fullname' => true,
        'target_id' => true,
        'target_pk' => true,
        'target_username' => true,
        'target_fullname' => true,
        'account' => true,
        'target' => true
    ];
}
