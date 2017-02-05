<?php
namespace App\Model\Table;

use App\Model\Entity\ObjectsUser;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ObjectsUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Objects
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $BorrowedStatus
 *
 * @method ObjectsUser get($primaryKey, $options = [])
 * @method ObjectsUser newEntity($data = null, array $options = [])
 * @method ObjectsUser[] newEntities(array $data, array $options = [])
 * @method ObjectsUser|bool save(EntityInterface $entity, $options = [])
 * @method ObjectsUser patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method ObjectsUser[] patchEntities($entities, array $data, array $options = [])
 * @method ObjectsUser findOrCreate($search, callable $callback = null, $options = [])
 */
class ObjectsUsersTable extends Table
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

        $this->table('objects_users');
        $this->displayField('object_id');
        $this->primaryKey(['object_id', 'user_id']);

        $this->belongsTo('Objects', [
            'foreignKey' => 'object_id',
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
            ->date('date_begin')
            ->requirePresence('date_begin', 'create')
            ->notEmpty('date_begin');

        $validator
            ->date('date_end')
            ->requirePresence('date_end', 'create')
            ->notEmpty('date_end');

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
        $rules->add($rules->existsIn(['object_id'], 'Objects'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['borrowed_status_id'], 'BorrowedStatus'));

        return $rules;
    }
}
