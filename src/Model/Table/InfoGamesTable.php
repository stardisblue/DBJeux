<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InfoGames Model
 *
 * @property \Cake\ORM\Association\HasMany $Games
 *
 * @method \App\Model\Entity\InfoGame get($primaryKey, $options = [])
 * @method \App\Model\Entity\InfoGame newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InfoGame[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InfoGame|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InfoGame patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InfoGame[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InfoGame findOrCreate($search, callable $callback = null)
 */
class InfoGamesTable extends Table
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

        $this->table('info_games');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Games', [
            'foreignKey' => 'info_game_id'
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
}
