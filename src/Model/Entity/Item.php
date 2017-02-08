<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property int $info_item_id
 * @property int $user_id
 * @property bool $allow_borrow
 * @property int $item_state_id
 *
 * @property \App\Model\Entity\InfoItem $info_item
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\ItemState $item_state
 */
class Item extends Entity
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
        '*' => true,
        'id' => false
    ];
}
