<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Consultation Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $day
 * @property string $hour
 * @property int $specialty_id
 * @property \App\Model\Entity\Specialty $specialty
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $status_id
 * @property \App\Model\Entity\StatusConsultation $status_consultation
 * @property int $district_id
 * @property \App\Model\Entity\District $district
 * @property string $note
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Consultation extends Entity
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
