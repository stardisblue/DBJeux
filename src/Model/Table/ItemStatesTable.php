<?php
namespace App\Model\Table;

use App\Model\Entity\ItemState;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemStates Model
 *
 * @property \Cake\ORM\Association\HasMany $Objects
 *
 * @method ItemState get($primaryKey, $options = [])
 * @method ItemState newEntity($data = null, array $options = [])
 * @method ItemState[] newEntities(array $data, array $options = [])
 * @method ItemState|bool save(EntityInterface $entity, $options = [])
 * @method ItemState patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method ItemState[] patchEntities($entities, array $data, array $options = [])
 * @method ItemState findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemStatesTable extends Table
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

        $this->table('item_states');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Objects', [
            'foreignKey' => 'item_state_id'
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
