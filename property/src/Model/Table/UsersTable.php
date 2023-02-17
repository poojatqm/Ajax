<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->hasOne('UserProfiles')
         ->setDependent(true);
         
        //  $this->hasOne('Properties')
        //  ->setDependent(true);
        
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
        ->email('email')
        ->requirePresence('email', 'create')
        ->notEmptyString('email')
        ->add('email', 'unique', [
            'rule' => 'validateUnique', 'provider' => 'table',
            'message' => 'Email already exist please enter another email',
        ]);

        $validator
        ->scalar('password')
        ->maxLength('password', 100)
        ->requirePresence('password', 'create')
        ->notEmptyString('password')
        ->add('password',[
            'password'=>[
                'rule'=>array('custom', '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'),
                'message'=>'Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character'
            ]
            ]);

            $validator
            ->scalar('confirm_password')
            ->maxLength('confirm_password', 100)
            ->requirePresence('confirm_password', 'create')
            ->notEmptyString('confirm_password')
            ->add('confirm_password', [
                'match' => [
                    'rule' => ['comparewith','password'],
                    'message' => 'Passwords do not match'
                    
                ]
            ]);

        $validator
            ->scalar('user_type')
            ->allowEmptyString('user_type');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            ->allowEmptyDateTime('modified_date');
      

        return $validator;
    }
}
