package hito2;

import java.sql.*;

public class mostrar {
    public static void mostrarPeliculas() {
        // conexión base de datos
        String url = "jdbc:mysql://localhost:3306/cine_danielbarrera";
        String usuario = "root";
        String contrasena = "curso";
        // Consulta SQL para obtener todas las películas
        String sql = "SELECT * FROM peliculas";

        try {
            // Establecer la conexión a la base de datos
            Connection conexion = DriverManager.getConnection(url, usuario, contrasena);
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery(sql);

            // Recorrer todos los resultados obtenidos de la base de datos
            while (rs.next()) {
                System.out.println("Código: " + rs.getString("codigo"));
                System.out.println("Título: " + rs.getString("titulo"));
                System.out.println("Duración: " + rs.getInt("duracion") + " minutos");
                System.out.println("Género: " + rs.getString("genero"));
                System.out.println("Nota: " + rs.getString("nota"));
                System.out.println("Sala ID: " + rs.getInt("sala_id"));
                System.out.println("-----------------------------------");
            }

            // Cerrar los recursos de la base de datos
            rs.close();
            stmt.close();
            conexion.close();

        } catch (SQLException e) {
            // Manejar errores de base de datos
            System.out.println("Error al acceder a la base de datos: " + e.getMessage());
        }
    }
}
