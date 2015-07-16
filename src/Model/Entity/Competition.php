<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Competition Entity.
 */
class Competition extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'date_competition' => true,
        'lieu' => true,
        'type' => true,
        'description' => true,
        'selected' => true,
    ];
}
