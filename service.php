
<?php


class UserService {

	private $conexao;
	private $usuario;

	public function __construct(Conexao $conexao, Usuario $usuario) {
		$this->conexao = $conexao->conectar();
		$this->usuario = $usuario;
	}

	public function inserir() { 
		$query = 'insert into cadusuario(nome,email,cpf,competencias,telefone)values(:nome,:email,:cpf,:competencias,:telefone)';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->usuario->__get('nome'));
		$stmt->bindValue(':email', $this->usuario->__get('email'));
		$stmt->bindValue(':cpf', $this->usuario->__get('cpf'));
		$stmt->bindValue(':competencias', $this->usuario->__get('competencias'));
		$stmt->bindValue(':telefone', $this->usuario->__get('telefone'));
		$stmt->execute();
	}

	public function checa_cpf() {
		$query = '
			select 
				cpf
			from 
				cadusuario
			where cpf = :cpf
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cpf', $this->usuario->__get('cpf'));
		$stmt->execute();
		return $stmt->fetchColumn();
	}

	public function recuperar_usuarios() {
		$query = '
			select 
				*
			from 
				cadusuario
			order by nome;
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cpf', $this->usuario->__get('cpf'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function validar() {
		$query = '
			update cadusuario
			set status = :status
			where 
			 cpf = :cpf
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':status', 'T');
		$stmt->bindValue(':cpf', $this->usuario->__get('cpf'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
/*
	public function atualizar() { //update

		$query = "update tb_tarefas set tarefa = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function remover() { //delete

		$query = 'delete from tb_tarefas where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->execute();
	}

	public function marcarRealizada() { //update

		$query = "update tb_tarefas set id_status = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function recuperarTarefasPendentes() {
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			where
				t.id_status = :id_status
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}*/
}

?>