<?php
namespace App\Model\Table;

use App\Model\Entity\ItemsUser;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemsUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $BorrowedStatus
 *
 * @method ItemsUser get($primaryKey, $options = [])
 * @method ItemsUser newEntity($data = null, array $options = [])
 * @method ItemsUser[] newEntities(array $data, array $options = [])
 * @method ItemsUser|bool save(EntityInterface $entity, $options = [])
 * @method ItemsUser patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method ItemsUser[] patchEntities($entities, array $data, array $options = [])
 * @method ItemsUser findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsUsersTable extends Table
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

        $this->table('items_users');
        $this->displayField('item_id');
        $this->primaryKey(['item_id', 'user_id']);

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('BorrowedStatus', [
            'foreignKey' => 'borrowed_status_id',
            'joinType' => 'INNER'
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
            ->integer('item_id')
            ->requirePresence('item_id', 'create')
            ->notEmpty('item_id');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmpty('user_id');

        $validator
            ->date('date_begin')
            ->requirePresence('date_begin', 'create')
            ->notEmpty('date_begin');

        $validator
            ->date('date_end')
            ->requirePresence('date_end', 'create')
            ->notEmpty('date_end');

        $validator
            ->integer('borrowed_status_id')
            ->requirePresence('borrowed_status_id', 'create')
            ->notEmpty('borrowed_status_id');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['borrowed_status_id'], 'BorrowedStatus'));

        return $rules;
    }
}
