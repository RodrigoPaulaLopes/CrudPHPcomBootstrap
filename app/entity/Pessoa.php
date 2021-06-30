<?php
namespace App\entity;

use App\db\Database;
use \PDO;

class Pessoa{
    public $id;
    public $nome;
    public $idade;

    public function cadastrar(){
        //pegar o banco de dados.
        $database = new Database('usuarios');
        $this->id = $database->insert([
            'nome' => $this->nome,
            'idade'=> $this->idade
        ]);
        print_r($this);
    }
    public static function getPessoas($where = null, $order = null, $limit = null){
        return (new Database('usuarios'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function getPessoa($id){
        return (new Database('usuarios'))->select('id= '.$id)->fetchObject(self::class);
    }
    public function atualizar(){
        return (new Database('usuarios'))->update('id = '.$this->id, ([
            'nome' => $this->nome,
            'idade'=> $this->idade
        ]));
    }
    public function excluir(){
        return (new Database('usuarios'))->delete('id = ', $this->id);
    }


}
?>