<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;


use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $password
 * @property string|null $gender
 * @property \Cake\I18n\FrozenTime|null $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 * @property string|null $code
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'fname' => true,
        'lname' => true,
        'phone' => true,
        'email' => true,
        'password' => true,
        'gender' => true,
        'created_date' => true,
        'modified_date' => true,
        'code' => true,
        'image' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
