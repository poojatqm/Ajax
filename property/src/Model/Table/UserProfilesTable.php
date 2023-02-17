<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserProfiles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserProfile newEmptyEntity()
 * @method \App\Model\Entity\UserProfile newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserProfile findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserProfile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProfile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProfile[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserProfilesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('user_profiles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }


    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->notEmptyString('first_name', 'please enter your first name')
            ->add('first_name', [
                'first_name' => [
                    'rule' => array('custom', '/^[A-Za-z_][A-Za-z\d_]*$/'),
                    'message' => 'plaese enter first name in characters'
                ]
            ]);
        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->notEmptyString('last_name', 'please enter your last name')
            ->add('last_name', [
                'lst_name' => [
                    'rule' => array('custom', '/^[A-Za-z_][A-Za-z\d_]*$/'),
                    'message' => 'plaese enter last name in characters'
                ]
            ]);

        $validator
            ->integer('contact_number')
            ->maxLength('contact_number', 10)
            ->notEmptyString('contact_number');

        $validator
            ->scalar('address')
            ->maxLength('address', 55)
            ->notEmptyString('address','please enter address');

         
            $validator
            ->scalar('image')
            ->maxLength('image', 25578567)
            ->allowEmptyFile('image');
        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            // ->requirePresence('modified_date', 'create')
            ->notEmptyDateTime('modified_date');

        return $validator;
    }

  
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
