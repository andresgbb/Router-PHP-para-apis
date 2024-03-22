<?php
namespace App\Controllers;

use PDO;
use PDOException;
use App\Request;
class UserController {
    protected $pdo;
    protected $request; // Agrega esta propiedad

    public function __construct(PDO $pdo, Request $request) {
        $this->pdo = $pdo;
        $this->request = $request; // Almacena la instancia de Request
    }
    public function index() {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM users");
            $statement->execute();
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            // Mostrar los usuarios
            foreach ($users as $user) {
                echo "ID: " . $user['id'] . ", Name: " . $user['name'] . "<br>";
            }
        } catch (PDOException $e) {
            echo "Error al obtener usuarios: " . $e->getMessage();
        }
    }

    public function store($request) {
        // Obtener el contenido JSON del cuerpo de la solicitud
        $requestData = json_decode(file_get_contents('php://input'), true);
        
        // Verificar si el campo 'name' está presente en los datos de la solicitud
        if (isset($requestData['name'])) {
            // Obtener el nombre del usuario de los datos de la solicitud
            $name = $requestData['name'];
        
            try {
                // Preparar la consulta SQL
                $statement = $this->pdo->prepare("INSERT INTO users (name) VALUES (:name)");
        
                // Ejecutar la consulta con los parámetros
                $statement->execute([
                    'name' => $name,
                ]);
        
                // Devolver una respuesta adecuada
                echo "El usuario $name ha sido creado exitosamente.";
            } catch (PDOException $e) {
                // Manejar errores de la base de datos
                echo "Error al crear el usuario: " . $e->getMessage();
            }
        } else {
            // Si el campo 'name' no está presente en los datos de la solicitud, responder con un mensaje de error
            echo "El campo 'name' no está presente en la solicitud.";
        }
    }
    public function update($parameters) {
        // Lógica para manejar la actualización de un usuario existente
        $requestData = json_decode(file_get_contents('php://input'), true);
        $id = $requestData['id'];
        $name = $requestData['name'];
        try {
            // Preparar la consulta SQL
            $statement = $this->pdo->prepare("UPDATE users SET name = :name  WHERE id = :id");

            // Ejecutar la consulta con los parámetros
            $statement->execute([
                'id' => $id,
                'name' => $name,
            ]);

            // Devolver una respuesta adecuada
            echo "El usuario con ID $id ha sido actualizado correctamente.";
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error al actualizar el usuario: " . $e->getMessage();
        }
    }

    public function destroy($parameters) {
        // Lógica para manejar la eliminación de un usuario
        $requestData = json_decode(file_get_contents('php://input'), true);
        $id = $requestData['id'];
        try {
            // Preparar la consulta SQL
            $statement = $this->pdo->prepare("DELETE FROM users WHERE id = :id");

            // Ejecutar la consulta con los parámetros
            $statement->execute([
                'id' => $id
            ]);
            echo "El usuario con ID $id ha sido eliminado correctamente.";
        } catch (PDOException $e) {
            echo "Error al eliminar el usuario: " . $e->getMessage();
        }
    }
}




