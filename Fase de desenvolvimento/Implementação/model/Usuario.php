<?php
include_once("conexaoDB.php");
include_once("Pessoa.php");

class Usuario extends Pessoa{
    private $conn;
    private $email;
    private $senha;
    private $tipo; //New

    //New
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }
    
    public function getNome(): string {
        return $this->nome;
    }
    
    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }
    
    public function getTelefone(): string {
        return $this->telefone;
    }
    
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    
    public function getEmail(): string {
        return $this->email;
    }

    public function __construct() {
      
    }
  
    public function getSenha() {
      return $this->senha;
    }

    //New
    public function getTipo() {
        return $this->tipo;
      }
    

	public function setSenha($senha){
		$this->senha = $senha;
		return $this;
	}

    //New
    public function setTipo($tipo){
		$this->tipo = $tipo;
		return $this;
	}

    public function autenticarUsuario($email, $senha) {
        $this->conn = conexaoDB::conexao();

        $query = "SELECT * FROM usuario WHERE email = :email ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch();
        if($usuario && password_verify($senha, $usuario['Senha'])) {
            $_SESSION['tipo_usuario'] = $usuario['Perfil_id_fk'];
            $_SESSION['nome_usuario'] = $usuario['Nome'];
            $_SESSION['id_usuario'] = $usuario['Usuario_ID'];
            return true;
        }
        else{
            $_SESSION['login_erro'] = "Email e/ou senha inválido(s)!";
            header("Location: /?login_erro=1");
            exit();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("location: /");
        exit();
    }


}
  
  