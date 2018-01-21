<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vassal Entity
 *
 * @property int $id
 * @property int $account_id
 * @property int $accountlist_id
 * @property bool $follow
 * @property bool $relevant
 * @property bool $testrelevant
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property bool $bycomment
 *
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Accountlist $accountlist
 */
class Vassal extends Entity
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
        'accountlist_id' => true,
        'follow' => true,
        'relevant' => true,
        'testrelevant' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'bycomment' => true,
        'account' => true,
        'accountlist' => true
    ];
}
