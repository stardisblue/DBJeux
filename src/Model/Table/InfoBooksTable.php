<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InfoBooks Model
 *
 * @property \Cake\ORM\Association\HasMany $Books
 *
 * @method \App\Model\Entity\InfoBook get($primaryKey, $options = [])
 * @method \App\Model\Entity\InfoBook newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InfoBook[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InfoBook|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InfoBook patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InfoBook[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InfoBook findOrCreate($search, callable $callback = null)
 */
class InfoBooksTable extends Table
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

        $this->table('info_books');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Books', [
            'foreignKey' => 'info_book_id'
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
            ->allowEmpty('author');

        return $validator;
    }
}
