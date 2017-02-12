<?php
namespace App\Model\Table;

use App\Model\Entity\Item;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \Cake\ORM\Association\BelongsTo $InfoItems
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $ItemStates
 * @property \Cake\ORM\Association\BelongsToMany $UsersBelogsToMany
 *
 * @method Item get($primaryKey, $options = [])
 * @method Item newEntity($data = null, array $options = [])
 * @method Item[] newEntities(array $data, array $options = [])
 * @method Item|bool save(EntityInterface $entity, $options = [])
 * @method Item patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Item[] patchEntities($entities, array $data, array $options = [])
 * @method Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsTable extends Table
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

        $this->table('items');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('InfoItems', [
            'foreignKey' => 'info_item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ItemStates', [
            'foreignKey' => 'item_state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'item_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'items_users'
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
            ->boolean('allow_borrow')
            ->requirePresence('allow_borrow', 'create')
            ->notEmpty('allow_borrow');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmpty('user_id');

        $validator
            ->integer('info_item_id')
            ->requirePresence('info_item_id', 'create')
            ->notEmpty('info_item_id');

        $validator
            ->integer('item_state_id')
            ->requirePresence('item_state_id', 'create')
            ->notEmpty('item_state_id');

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
        $rules->add($rules->existsIn(['info_item_id'], 'InfoItems'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['item_state_id'], 'ItemStates'));

        return $rules;
    }
}
