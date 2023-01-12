<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Userdetails Model
 *
 * @method \App\Model\Entity\Userdetail newEmptyEntity()
 * @method \App\Model\Entity\Userdetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Userdetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Userdetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Userdetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Userdetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Userdetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Userdetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Userdetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Userdetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Userdetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Userdetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Userdetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserdetailsTable extends Table
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

        $this->setTable('userdetails');
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
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->allowEmptyString('first_name')
            ->notEmptyString('first_name','please enter the first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 100)
            ->allowEmptyString('last_name')
            ->notEmptyString('last_name','please enter the last_name');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 100)
            ->allowEmptyString('phone_number')
            ->notEmptyString('phone_number','please enter the phone_number');

        $validator
            ->scalar('Gender')
            ->maxLength('Gender', 100)
            ->allowEmptyString('Gender')
            ->notEmptyString('Gender','please enter the Gender');

        return $validator;
    }
}
