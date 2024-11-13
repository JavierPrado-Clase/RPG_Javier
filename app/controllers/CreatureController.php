<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once __DIR__ . '/../../persistence/DAO/CreatureDAO.php';
require_once __DIR__ . '/../models/Creature.php';
require_once __DIR__ . '/../../persistence/conf/PersistentManager.php';

$persistentManager = PersistentManager::getInstance();
$conn = $persistentManager->get_connection();

class CreatureController {
    private $creatureDAO;
    
    public function __construct() {
        $this->creatureDAO = new CreatureDAO();
    }

     public function listCreatures() {
        return $creatures = $this->creatureDAO->getAllCreatures();
        
    }
    public function createCreature($name, $description, $avatar, $attackPower, $lifeLevel, $weapon) {
        // Creamos un objeto de tipo Creature
        $creature = new Creature();
        $creature->setName($name);
        $creature->setDescription($description);
        $creature->setAvatar($avatar);
        $creature->setAttackPower($attackPower);
        $creature->setLifeLevel($lifeLevel);
        $creature->setWeapon($weapon);

        // Usamos el DAO para insertar la criatura en la base de datos
        $this->creatureDAO->insertCreature($creature);
    }
    public function getCreatureById($id) {
        return $creature = $this->creatureDAO->getCreatureById($id);
    }
     public function updateCreature($id, $name, $description, $avatar, $attackPower, $lifeLevel, $weapon) {
        $creature = new Creature();
        $creature->setIdCreature($id);
        $creature->setName($name);
        $creature->setDescription($description);
        $creature->setAvatar($avatar);
        $creature->setAttackPower($attackPower);
        $creature->setLifeLevel($lifeLevel);
        $creature->setWeapon($weapon);

        // Actualizamos la criatura en la base de datos
        $this->creatureDAO->updateCreature($creature);
    }
    
    public function deleteCreature($id) {
        return $this->creatureDAO->deleteCreature($id);
    }
}