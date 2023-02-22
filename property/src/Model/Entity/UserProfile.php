<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

class UserProfile extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'first_name' => true,
        'last_name' => true,
        'contact_number' => true,
        'address' => true,
        'image' => true,
        'status' => true,
        'created_date' => true,
        'modified_date' => true,
    ];

    protected $_hidden = [
        'password',
    ];
}