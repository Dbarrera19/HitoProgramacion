package hito2;

import java.sql.*;
import java.util.Scanner;

public class añadir {

    public static void añadirPelicula(Scanner sc) {
        // Pedimos los datos de la película al usuario
        System.out.println("\nIntroduce el código de la película: ");
        String codigo = sc.nextLine();

        System.out.println("Introduce el título de la película: ");
        String titulo = sc.nextLine();

        System.out.println("Introduce la duración de la película: ");
        int duracion = sc.nextInt();
        sc.nextLine();  

        System.out.println("Introduce el género de la película: ");
        String genero = sc.nextLine();

        System.out.println("Introduce la nota de la película: ");
        String nota = sc.nextLine();

        System.out.println("Introduce el ID de la sala: ");
        int salaId = sc.nextInt();
        sc.nextLine();  

        // conexión base de datos
        String url = "jdbc:mysql://localhost:3306/cine_danielbarrera";
        String usuario = "root";
        String contrasena = "curso";

        // Consultamos el SQL para verificar si ya existe una película con el mismo código
        String sqlCheck = "SELECT COUNT(*) FROM peliculas WHERE codigo = ?";
        // Consultamos el SQL para insertar una nueva película
        String sqlInsert = "INSERT INTO peliculas (codigo, titulo, duracion, genero, nota, sala_id) VALUES (?, ?, ?, ?, ?, ?)";

        try (Connection conexion = DriverManager.getConnection(url, usuario, contrasena);
             PreparedStatement psCheck = conexion.prepareStatement(sqlCheck)) {

            // Preparar la consulta para verificar si la película existe
            psCheck.setString(1, codigo);
            ResultSet rs = psCheck.executeQuery();
            rs.next();

            // Si ya existe, mostrar un mensaje de error
            if (rs.getInt(1) > 0) {
                System.out.println("Error: Ya existe una película con el código " + codigo);
            } else {
                // Si no existe, se inserta la nueva película en la base de datos
                try (PreparedStatement psInsert = conexion.prepareStatement(sqlInsert)) {
                    psInsert.setString(1, codigo);
                    psInsert.setString(2, titulo);
                    psInsert.setInt(3, duracion);
                    psInsert.setString(4, genero);
                    psInsert.setString(5, nota);
                    psInsert.setInt(6, salaId);

                    int filasAfectadas = psInsert.executeUpdate();
                    // Mostramos un mensaje de éxito o de error al añadir la película
                    System.out.println(filasAfectadas > 0 ? "Película añadida correctamente." : "Error al añadir la película.");
                }
            }

        } catch (SQLException e) {
            System.out.println("Error al acceder a la base de datos: " + e.getMessage());
        }
    }
}
