<?php
namespace App\Model\Table;

use App\Model\Entity\ObjectType;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ObjectTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $InfoObjects
 *
 * @method ObjectType get($primaryKey, $options = [])
 * @method ObjectType newEntity($data = null, array $options = [])
 * @method ObjectType[] newEntities(array $data, array $options = [])
 * @method ObjectType|bool save(EntityInterface $entity, $options = [])
 * @method ObjectType patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method ObjectType[] patchEntities($entities, array $data, array $options = [])
 * @method ObjectType findOrCreate($search, callable $callback = null, $options = [])
 */
class ObjectTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('object_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('InfoObjects', [
            'foreignKey' => 'object_type_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
