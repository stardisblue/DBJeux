<?php

namespace App\Model\Table;

use App\Model\Entity\InfoItem;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InfoItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ItemTypes
 * @property \Cake\ORM\Association\HasMany $Items
 *
 * @method InfoItem get($primaryKey, $options = [])
 * @method InfoItem newEntity($data = null, array $options = [])
 * @method InfoItem[] newEntities(array $data, array $options = [])
 * @method InfoItem|bool save(EntityInterface $entity, $options = [])
 * @method InfoItem patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method InfoItem[] patchEntities($entities, array $data, array $options = [])
 * @method InfoItem findOrCreate($search, callable $callback = null, $options = [])
 */
class InfoItemsTable extends Table
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

        $this->table('info_items');
        $this->displayField('author_title_type');
        $this->primaryKey('id');

        $this->belongsTo('ItemTypes', [
            'foreignKey' => 'item_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'info_item_id'
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
            ->integer('item_type_id')
            ->requirePresence('item_type_id', 'create')
            ->notEmpty('item_type_id');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('isbn')
            ->allowEmpty('isbn');

        // TODO : to float
        $validator
            ->decimal('float_price')
            ->allowEmpty('float_price');

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
        $rules->add($rules->existsIn(['item_type_id'], 'ItemTypes'));

        return $rules;
    }
}
