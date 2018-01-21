<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $account_id
 * @property int $target_id
 * @property string $threadid
 * @property string $itemid
 * @property int $takenat
 * @property string $content
 * @property bool $read
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property string $cursornewest
 * @property string $cursoroldest
 *
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Target $target
 */
class Message extends Entity
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
        'target_id' => true,
        'threadid' => true,
        'itemid' => true,
        'takenat' => true,
        'content' => true,
        'read' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'cursornewest' => true,
        'cursoroldest' => true,
        'account' => true,
        'target' => true
    ];
}
