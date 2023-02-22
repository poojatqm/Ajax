<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PropertyCategoriesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('property_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        // $this->belongsTo('Properties', [
        //     'foreignKey' => 'category_id',
        //     'joinType' => 'INNER',
        // ]);

        $this->hasMany('Properties', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
       

    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('property_id')
            ->notEmptyString('property_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->notEmptyString('name','category name is required');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
           
            ->notEmptyDateTime('modified_date');

        return $validator;
    }

 
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('property_id', 'Properties'), ['errorField' => 'property_id']);

        return $rules;
    }
}
