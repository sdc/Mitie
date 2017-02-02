<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TicketsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tickets');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->allowEmpty('department');

        $validator
            ->allowEmpty('phone');

        $validator
            ->requirePresence('building_id')
            ->notEmpty('building');

        $validator
            ->requirePresence('room', 'create')
            ->notEmpty('room');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->allowEmpty('priority');

        $validator
            ->allowEmpty('additional');

        $validator
            ->boolean('sent')
            ->allowEmpty('sent');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn('building_id', 'Buildings'));

        return $rules;
    }
}
