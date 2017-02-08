<?php
namespace App\Model\Table;

use App\Model\Entity\BorrowedStatus;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BorrowedStatus Model
 *
 * @property \Cake\ORM\Association\HasMany $ItemsUsers
 *
 * @method BorrowedStatus get($primaryKey, $options = [])
 * @method BorrowedStatus newEntity($data = null, array $options = [])
 * @method BorrowedStatus[] newEntities(array $data, array $options = [])
 * @method BorrowedStatus|bool save(EntityInterface $entity, $options = [])
 * @method BorrowedStatus patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method BorrowedStatus[] patchEntities($entities, array $data, array $options = [])
 * @method BorrowedStatus findOrCreate($search, callable $callback = null, $options = [])
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
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('ItemsUsers', [
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
