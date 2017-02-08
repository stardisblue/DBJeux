<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InfoItem Entity
 *
 * @property int $id
 * @property int $item_type_id
 * @property string $title
 * @property string $description
 * @property int $isbn
 * @property int $price
 * @property bool $nsfw
 * @property string $author
 *
 * @property \App\Model\Entity\ItemType $item_type
 * @property \App\Model\Entity\Item[] $items
 */
class InfoItem extends Entity
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
