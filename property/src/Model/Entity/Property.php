<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
class Property extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'title' => true,
        'description' => true,
        'category_id' => true,
        'image' => true,
        'tags' => true,
        'status' => true,
        'property_status' => true,
        'created_date' => true,
        'modified_date' => true
    ];
}
