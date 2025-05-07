package hito2;

import java.sql.*;
import java.util.Scanner;

public class eliminar {
    public static void eliminarPelicula(Scanner sc) {
        System.out.print("Introduce el código de la película a eliminar: ");
        String codigo = sc.nextLine();

        String url = "jdbc:mysql://localhost:3306/cine_danielbarrera";
        String usuario = "root";
        String contrasena = "curso";

        // Consulta SQL para eliminar la película con el código indicado
        String sql = "DELETE FROM peliculas WHERE codigo = ?";

        try (Connection conexion = DriverManager.getConnection(url, usuario, contrasena);
             PreparedStatement stmt = conexion.prepareStatement(sql)) {

            // Establecemos el código de la película en la consulta
            stmt.setString(1, codigo);
            // Ejecutamos la consulta de eliminación
            int filas = stmt.executeUpdate();

            // Se muestra mensaje de éxito o error
            System.out.println(filas > 0 ? "Película eliminada correctamente." : "No se encontró la película con ese código.");

        } catch (SQLException e) {
            // Manejar errores de base de datos
            System.out.println("Error al acceder a la base de datos: " + e.getMessage());
        }
    }
}
