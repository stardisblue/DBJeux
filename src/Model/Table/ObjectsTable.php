<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Objects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $InfoObjects
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $ItemStates
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Object get($primaryKey, $options = [])
 * @method \App\Model\Entity\Object newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Object[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Object|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Object patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Object[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Object findOrCreate($search, callable $callback = null)
 */
class ObjectsTable extends Table
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

        $this->table('objects');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('InfoObjects', [
            'foreignKey' => 'info_object_id',
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
            'foreignKey' => 'object_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'objects_users'
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
        $rules->add($rules->existsIn(['info_object_id'], 'InfoObjects'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['item_state_id'], 'ItemStates'));

        return $rules;
    }
}