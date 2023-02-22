<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class PropertyCategory extends Entity
{
    
    protected $_accessible = [
        'property_id' => true,
        'user_id' => true,
        'name' => true,
        'status' => true,
        'created_date' => true,
        'modified_date' => true,
        'property' => true,
    ];
}
