<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InfoObject Entity
 *
 * @property int $id
 * @property int $object_type_id
 * @property string $title
 * @property string $description
 * @property int $isbn
 * @property int $price
 * @property bool $nsfw
 * @property string $author
 *
 * @property \App\Model\Entity\ObjectType $object_type
 * @property \App\Model\Entity\Object[] $objects
 */
class InfoObject extends Entity
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
