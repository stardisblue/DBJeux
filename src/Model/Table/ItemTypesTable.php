<?php
namespace App\Model\Table;

use App\Model\Entity\ItemType;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $InfoItems
 *
 * @method ItemType get($primaryKey, $options = [])
 * @method ItemType newEntity($data = null, array $options = [])
 * @method ItemType[] newEntities(array $data, array $options = [])
 * @method ItemType|bool save(EntityInterface $entity, $options = [])
 * @method ItemType patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method ItemType[] patchEntities($entities, array $data, array $options = [])
 * @method ItemType findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemTypesTable extends Table
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

        $this->table('item_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('InfoItems', [
            'foreignKey' => 'item_type_id'
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
