<?php
namespace App\db;
USE PDO;
use PDOException;

class Database{
    const HOST = 'localhost';
    const NAME = 'cadastro';
    const USER = 'root';
    const PASS = '';
    //qual tabela iremos manipular.
    private $table;
    private $connection;

    //defino a tabela e instancio a conexão
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }
    //metodo resposavel por criar uma conexão com o banco de dados.
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
    public function execute($query, $params = []){
        try{
            $statment = $this->connection->prepare($query);
            $statment->execute($params);
            return $statment;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function insert($values){
        $tableFields = array_keys($values);
        $binds = array_pad([], count($tableFields),'?');
        $query = 'INSERT INTO '.$this->table.'('.implode(",", $tableFields).') VALUES ('.implode(",", $binds).')';
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = strlen($where) ? 'WHERE'.$where : '';
        $order = strlen($order) ? 'ORDER BY'.$order : '';
        $limit = strlen($limit) ? 'LIMIT'.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.''.$where.''.$order.''.$limit;
        return $this->execute($query);
    }
    public function update($where, $values){

        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $fields).'=? WHERE '.$where;
        $this->execute($query, $values);
        return true;
    }
    public function delete($where){
        $sql = 'DELETE FROM'.$this->table.'WHERE'.$where;
        $this->execute($sql);
        return true;
    }
}
?>