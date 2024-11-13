<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CreatureDAO
 *
 * @author javie
 */

require_once __DIR__ . '/../../app/models/Creature.php';
require_once __DIR__ . '/../conf/PersistentManager.php';




class CreatureDAO {
    private $conn;
    
    public function __construct() {
        $persistentManager = PersistentManager::getInstance();
        $this->conn = $persistentManager->get_connection();
        
    }

    public function getAllCreatures() {
   
    
    // Verificamos si la conexión es válida antes de ejecutar la consulta
    if ($this->conn) {
        $sql = "SELECT * FROM creature";
        $result = mysqli_query($this->conn, $sql);
        
        $creatures = array();
            while ($creatureBD = mysqli_fetch_array($result)) {
                $creature = new Creature();
                $creature->setIdCreature($creatureBD['idCreature']);
                $creature->setName($creatureBD['name']);
                $creature->setDescription($creatureBD['description']);
                $creature->setAvatar($creatureBD['avatar']);
                $creature->setAttackPower($creatureBD['attackPower']);
                $creature->setLifeLevel($creatureBD['lifeLevel']);
                $creature->setWeapon($creatureBD['weapon']);

                array_push($creatures, $creature);
            }
        return $creatures;
    }
    
    
}
 public function insertCreature($creature) {
        // Preparamos la consulta SQL
        $sql = "INSERT INTO creature (name, description, avatar, attackPower, lifeLevel, weapon) 
                VALUES (?, ?, ?, ?, ?, ?)";

        // Preparamos la sentencia
        $stmt = mysqli_prepare($this->conn, $sql);
        if ($stmt) {
            // Vinculamos los parámetros con la sentencia
            mysqli_stmt_bind_param($stmt, "sssiis", 
                $creature->getName(),
                $creature->getDescription(),
                $creature->getAvatar(),
                $creature->getAttackPower(),
                $creature->getLifeLevel(),
                $creature->getWeapon()
            );

            // Ejecutamos la sentencia
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
    public function getCreatureById($id) {
        $sql = "SELECT * FROM creature WHERE idCreature = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $creatureRes = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        $creature = new Creature();
        $creature->setIdCreature($creatureRes['idCreature']);
                $creature->setName($creatureRes['name']);
                $creature->setDescription($creatureRes['description']);
                $creature->setAvatar($creatureRes['avatar']);
                $creature->setAttackPower($creatureRes['attackPower']);
                $creature->setLifeLevel($creatureRes['lifeLevel']);
                $creature->setWeapon($creatureRes['weapon']);
        return $creature;
    }
    public function updateCreature($creature) {
        $sql = "UPDATE creature SET name = ?, description = ?, avatar = ?, attackPower = ?, lifeLevel = ?, weapon = ? WHERE idCreature = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssiisi", 
            $creature->getName(),
            $creature->getDescription(),
            $creature->getAvatar(),
            $creature->getAttackPower(),
            $creature->getLifeLevel(),
            $creature->getWeapon(),
            $creature->getIdCreature()
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    public function deleteCreature($id) {
        $stmt = $this->conn->prepare("DELETE FROM creature WHERE idCreature = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        return $stmt->execute();
    }
}