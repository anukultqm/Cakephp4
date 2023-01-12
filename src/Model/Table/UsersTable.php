<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('fname')
            ->maxLength('fname', 8)
            ->allowEmptyString('fname')
            ->notEmptyString('fname','please enter the Fisrt name')
            ->add('fname',[
                [
                'rule'=>['custom','/^[A-Za-z]+$/i'],
                'message'=>'Please enter charcters only',
                ]
            ]);

        $validator
            ->scalar('lname')
            ->maxLength('lname', 15)
            ->allowEmptyString('lname')
            ->notEmptyString('lname','please enter the last name')
            ->add('lname',[
                [
                'rule'=>['custom','/^[A-Za-z]+$/i'],
                'message'=>'Please enter charcters only',
                ]
            ]);

        $validator
            ->integer('phone')
            ->minLength('phone', 10)
            ->maxLength('phone', 10)
            ->allowEmptyString('phone')
            ->notEmptyString('phone','please enter the phone number')
            ->add('phone',[
                [
                'rule'=>['custom','/^[0-9]+$/i'],
                'message'=>'Please enter number only',
                ]
            ]);

        $validator
            ->email('email')
            ->allowEmptyString('email')
            ->notEmptyString('email','please enter the Email');
            // ->add('email',[
            //     [
            //     'rule'=>['custom','/^[a-z]{0-9}+@[a-z]+.[a-z]+$/i'],
            //     'message'=>'Please enter valid format only',
            //     ]
            // ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->allowEmptyString('password')
            ->notEmptyString('password','please enter the Password')
            ->add('password',[
                'password'=>array("rule"=>array('custom','/[A-Z]/'),
                "message"=>'Password must contain at least one uppercase'),

                'password-2'=>array("rule"=>array('custom','/[a-z]/'),
                "message"=>'Password must contain at least lowercase'),

                'password-3'=>array("rule"=>array('custom','/[0-9]/'),
                "message"=>'Password must contain at least one numeric digit'),

                'password-4'=>array("rule"=>array('custom','/[!@#$%^&*_]/'),
                "message"=>'Password must contain at least one special character'),
                'password-4'=>array("rule"=>array('custom','/^\S+$/'),
                "message"=>'Password not be white space'),
            ]);

        $validator
            ->scalar('gender')
            ->maxLength('gender', 100)
            ->allowEmptyString('gender')
            ->notEmptyString('gender','please enter the Gender');
        $validator
                    
            ->notEmptyFile('image_file')
            ->add('image_file',[
                'mimeType' =>[
                    'rule' =>['mimeType',['image/jpg','image/png','image/jpeg']],
                    'message'=>'please uploade image jpg,png, or jpeg format',
                ],
                'fileSize'=>[
                    'rule'=>['fileSize','<=','2MB'],
                    'message'=>'please uploade image less then 2MB',
                ],
            ]);
       

        // $validator
        //     ->dateTime('created_date')
        //     ->allowEmptyDateTime('created_date');
        //     // ->notEmptyString('created_date','please enter the Fisrt name');

        // $validator
        //     ->dateTime('modified_date')
        //     ->allowEmptyDateTime('modified_date');
        //     // ->notEmptyString('modified_date','please enter the Fisrt name');

        // $validator
        //     ->scalar('code')
        //     ->maxLength('code', 255)
        //     ->allowEmptyString('code')
        //     ->notEmptyString('code','please enter the Code');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
