<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PropertiesTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('properties');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('PropertyCategories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
    }


    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('title')
            ->maxLength('title', 55)
            ->notEmptyString('title','Title is Required');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->notEmptyString('description','Description is Required');

        $validator
            ->scalar('category')
            ->maxLength('category', 100)
            ->notEmptyString('category','Category is Required');

            $validator
            ->scalar('image')
            ->maxLength('image', 25578567)
            ->allowEmptyFile('image');

        $validator
            ->scalar('tags')
            ->maxLength('tags', 100)
            ->requirePresence('tags', 'create')
            ->notEmptyString('tags','Tag is required');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            ->notEmptyDateTime('modified_date');

        return $validator;
    }
}
