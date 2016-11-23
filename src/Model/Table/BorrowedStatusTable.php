<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BorrowedStatus Model
 *
 * @property \Cake\ORM\Association\HasMany $ObjectsUsers
 *
 * @method \App\Model\Entity\BorrowedStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\BorrowedStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BorrowedStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BorrowedStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BorrowedStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BorrowedStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BorrowedStatus findOrCreate($search, callable $callback = null)
 */
class BorrowedStatusTable extends Table
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

        $this->table('borrowed_status');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('ObjectsUsers', [
            'foreignKey' => 'borrowed_status_id'
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
