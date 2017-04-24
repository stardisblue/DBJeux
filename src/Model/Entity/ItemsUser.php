<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemsUser Entity
 *
 * @property int $item_id
 * @property int $user_id
 * @property \Cake\I18n\Time $date_begin
 * @property \Cake\I18n\Time $date_end
 * @property int $borrowed_status_id
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\BorrowedStatus $borrowed_status
 */
class ItemsUser extends Entity
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
