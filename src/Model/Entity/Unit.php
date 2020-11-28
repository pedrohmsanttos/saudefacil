<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unit Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $cnes
 * @property int $rpa
 * @property string $address
 * @property string $phone
 * @property string $latitude
 * @property string $longitude
 * @property int $district_id
 * @property \App\Model\Entity\District $district
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Doctor[] $doctors
 * @property \App\Model\Entity\Specialty[] $specialties
 */
class Unit extends Entity
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
        'id' => false,
    ];
}
