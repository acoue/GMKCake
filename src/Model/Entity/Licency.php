<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Licency Entity.
 */
class Licency extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'prenom' => true,
        'nom' => true,
        'club_id' => true,
        'club' => true,
    ];
}
