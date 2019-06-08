<?php

require_once 'conexion.php';
session_start();
class Login
{

    private static $instancia;
    private $dbh;
 
    private function __construct()
    {

        $this->dbh = Conexion::singleton_conexion();

    }
 
    public static function singleton_login()
    {

        if (!isset(self::$instancia)) {

            $miclase = __CLASS__;
            self::$instancia = new $miclase;

        }

        return self::$instancia;

    }
	
	public function login_users($user,$password)
	{
		
		try {
			
			$sql = "SELECT * from usuario WHERE username = ? AND password = ?";
			$query = $this->dbh->prepare($sql);
			$query->bindParam(1,$user);
			$query->bindParam(2,$password);
			$query->execute();
			$this->dbh = null;

			//si existe el usuario
			if($query->rowCount() == 1)
			{
				 
				 $fila  = $query->fetch();
				 $_SESSION['username'] = $fila['username'];
				 $_SESSION['id_tipo_usuario'] = $fila['id_tipo_usuario']; 
				 $_SESSION['nombre'] = $fila['nombre'];
				 $tipo_usuario = $fila['id_tipo_usuario'];
				 $_SESSION['id'] = $fila['id']; // no borrar, id para obtener los datos del usuario		 
				 return TRUE;
	
			}else
			return FALSE;
			
		}catch(PDOException $e){
			
			print "Error!: " . $e->getMessage();
			
		}		
		
	}

	public  function registrar($rut, $nombre, $apellido, $cargo, $contraseña)
	{
		
		try {
			
			$sql = "INSERT INTO personal (rut,nombre/*,apellido,cargo,contraseña*/) VALUES ('".$rut."','".$nombre."')";
			$query = $this->dbh->prepare($sql);
			//$query->bindParam(1,$user);
			//$query->bindParam(2,sha1($password));
			$query->execute();
			$this->dbh = null;

			//si existe el usuario
			if($query->rowCount() == 1)
			{
				 
				 $fila  = $query->fetch();
				 $_SESSION['cargo'] = $fila['cargo'];	
				 $_SESSION['nombre'] = $fila['nombre'];	
				 $cargo = $fila['cargo'];		 
				 return TRUE;
	
			}else
			return FALSE;
			
		}catch(PDOException $e){
			
			print "Error!: " . $e->getMessage();
			
		}		
		
	}

	public function get_usuarios()
		{
		try {
			$sql = "SELECT * FROM personal";
			$query = $this->dbh->prepare($sql);
			$query->execute();
			return $query->fetchAll();
			$this->dbh = null;
			

			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();
			}
		}
		public function update_usuario($id,$nombre,$apellido,$cargo)
		{
			try {
				$query = $this->dbh->prepare('update personal SET nombre = ?, apellido = ?, cargo = ? WHERE rut = ?');
				$query->bindParam(1, $nombre);
				$query->bindParam(2, $apellido);
				$query->bindParam(3, $cargo);
				$query->bindParam(4, $id);
				$query->execute();
				$this->dbh = null;

				if($query->rowCount() == 1)
			{
				 
					 
				 return TRUE;
	
			}else
			return FALSE;
			} catch (PDOException $e) {
				print "Error!: " .$e->getMessage();
			}
		}

		public function select_personal($id)
		{
			try{

				$sql1 = "SELECT * from personal WHERE rut = ? ";
			$query1 = $this->dbh->prepare($sql1);
			$query1->bindParam(1,$id);
			$query1->execute();
			$this->dbh = null;
				if($query === FALSE){
					#No existe
					echo "¡No existe alguna persona con ese ID!";
				
				} else 

				return TRUE; 
				

			}catch (PDOException $e) {
				print "Error!: " .$e->getMessage();
			}
		}


		public function delete_personal($id)
		{
			try{

				/*$sql = "DELETE FROM personal WHERE rut = ?";
				$query = $this->dbh->prepare($sql);
				$query->bindParam(1, $rut);
            	$query->execute();
            	$this->dbh = null;*/
			$query = $this->dbh->prepare('delete from personal where rut = ?');
            $query->bindParam(1, $id);
            $query->execute();
			$this->dbh = null;
			if($query->rowCount() == 1)
			{
				 
					 
				 return TRUE;
	
			}else
			return FALSE;

			}catch (PDOException $e) {
				print "Error!: " .$e->getMessage();
			}
		}

     // Evita que el objeto se pueda clonar
    public function __clone()
    {

        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);

    }

}