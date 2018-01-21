<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Letter Entity
 *
 * @property int $id
 * @property int $messageid
 * @property int $userid
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $description
 * @property int $takenat
 * @property bool $active
 * @property int $lettertype
 * @property int $sequence
 */
class Letter extends Entity
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
        'messageid' => true,
        'userid' => true,
        'username' => true,
        'description' => true,
        'takenat' => true,
        'active' => true,
        'lettertype' => true,
        'sequence' => true,
        'firstname' => true,
        'lastname' => true
    ];
}
