<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Game Entity
 *
 * @property int $id
 * @property int $info_game_id
 * @property int $user_id
 * @property bool $allow_borrow
 * @property string $state
 *
 * @property \App\Model\Entity\InfoGame $info_game
 * @property \App\Model\Entity\User[] $users
 */
class Game extends Entity
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
