package hito2;

import java.sql.*;
import java.util.Scanner;

public class modificar {
    public static void modificarPelicula(Scanner sc) {
        // Pedir el código de la película 
        System.out.print("Introduce el código de la película a modificar: ");
        String codigo = sc.nextLine();

        // Pedir el nuevo título y duración de la película
        System.out.print("Introduce el nuevo título: ");
        String titulo = sc.nextLine();

        System.out.print("Introduce la nueva duración: ");
        int duracion = sc.nextInt();
        sc.nextLine();  

        // Conexión a la base de datos
        String url = "jdbc:mysql://localhost:3306/cine_danielbarrera";
        String usuario = "root";
        String contrasena = "curso";

        // Consultamos el SQL para modificar el título y la duración de la película
        String sql = "UPDATE peliculas SET titulo = ?, duracion = ? WHERE codigo = ?";

        try (Connection conexion = DriverManager.getConnection(url, usuario, contrasena);
             PreparedStatement stmt = conexion.prepareStatement(sql)) {

            // Establecemos los valores de la consulta
            stmt.setString(1, titulo);
            stmt.setInt(2, duracion);
            stmt.setString(3, codigo);

            // Ejecutar la consulta de actualización
            int filas = stmt.executeUpdate();
            
            // Mostrar mensaje de éxito o error
            System.out.println(filas > 0 ? "Película modificada correctamente." : "No se encontró la película con ese código.");

        } catch (SQLException e) {
            System.out.println("Error al acceder a la base de datos: " + e.getMessage());
        }
    }
}
