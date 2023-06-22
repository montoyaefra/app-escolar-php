<?php
	
	$mysqli = new mysqli("localhost", "root", "", "sistema");
	
?>
<?php  
class Connection{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $connection;


    public function __construct(){
        try{
            $this->connection = new PDO("mysql:host=$this->servidor;dbname=sistema", $this->usuario, $this->contrasenia);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            throw new Exception("Falla de conexión: " . $e->getMessage());
        }
    }

    public function ejecutar($sql, $paramos = []){ // insertar datos/delete/actualizar
        $this->connection->exec($sql);
        return $this->connection->lastInsertId();
        

    }

    public function consultar($sql){
        $sentencia=$this->connection->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }


    // public function update($sql, $params = []) {
    //     $sentencia = $this->connection->prepare($sql);
    //     $result = $sentencia->execute($params);
        
    //     if ($result) {
    //         return $sentencia->rowCount(); // Número de filas afectadas por la consulta
    //     } else {
    //         return false; // Hubo un error al ejecutar la consulta
    //     }
    // }
    


}

?>