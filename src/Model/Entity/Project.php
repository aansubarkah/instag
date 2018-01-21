<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $account_id
 * @property int $plan_id
 * @property int $days
 * @property string $name
 * @property \Cake\I18n\FrozenTime $started
 * @property \Cake\I18n\FrozenTime $ended
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $status
 * @property bool $active
 * @property int $daystounfollow
 * @property int $unliketoban
 * @property bool $followbyhashtag
 * @property bool $followbyidol
 * @property bool $likebyhashtag
 * @property bool $likebyidol
 * @property int $maximumlike
 * @property int $maximumfollow
 * @property bool $commentbyhashtag
 * @property bool $commentbyidol
 * @property int $maximumcomment
 * @property int $proxy_id
 * @property bool $followbycomment
 * @property bool $likebycomment
 * @property int $telegramid
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Plan $plan
 * @property \App\Model\Entity\Proxy $proxy
 * @property \App\Model\Entity\Accountlist[] $accountlists
 * @property \App\Model\Entity\Fan[] $fans
 * @property \App\Model\Entity\Hashtaglist[] $hashtaglists
 * @property \App\Model\Entity\Hate[] $hates
 * @property \App\Model\Entity\Proposal[] $proposals
 */
class Project extends Entity
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
        'user_id' => true,
        'account_id' => true,
        'plan_id' => true,
        'days' => true,
        'name' => true,
        'started' => true,
        'ended' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'active' => true,
        'daystounfollow' => true,
        'unliketoban' => true,
        'followbyhashtag' => true,
        'followbyidol' => true,
        'likebyhashtag' => true,
        'likebyidol' => true,
        'maximumlike' => true,
        'maximumfollow' => true,
        'commentbyhashtag' => true,
        'commentbyidol' => true,
        'maximumcomment' => true,
        'proxy_id' => true,
        'followbycomment' => true,
        'likebycomment' => true,
        'telegramid' => true,
        'user' => true,
        'account' => true,
        'plan' => true,
        'proxy' => true,
        'accountlists' => true,
        'fans' => true,
        'hashtaglists' => true,
        'hates' => true,
        'proposals' => true
    ];
}
