<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Building extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
