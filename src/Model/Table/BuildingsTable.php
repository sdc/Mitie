<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BuildingsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('buildings');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Tickets', [
            'foreignKey' => 'building_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        return $validator;
    }
}
