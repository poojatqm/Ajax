<?php
namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'user_type' => true,
        'status' => true,
        'created_date' => true,
        'modified_date' => true,
        'user_profile' => true,
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
