<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InfoObjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ObjectTypes
 * @property \Cake\ORM\Association\HasMany $Objects
 *
 * @method \App\Model\Entity\InfoObject get($primaryKey, $options = [])
 * @method \App\Model\Entity\InfoObject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InfoObject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InfoObject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InfoObject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InfoObject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InfoObject findOrCreate($search, callable $callback = null)
 */
class InfoObjectsTable extends Table
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

        $this->table('info_objects');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('ObjectTypes', [
            'foreignKey' => 'object_type_id'
        ]);
        $this->hasMany('Objects', [
            'foreignKey' => 'info_object_id'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('isbn')
            ->allowEmpty('isbn');

        $validator
            ->integer('price')
            ->allowEmpty('price');

        $validator
            ->boolean('nsfw')
            ->allowEmpty('nsfw');

        $validator
            ->requirePresence('author', 'create')
            ->notEmpty('author');

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
        $rules->add($rules->existsIn(['object_type_id'], 'ObjectTypes'));

        return $rules;
    }
}
