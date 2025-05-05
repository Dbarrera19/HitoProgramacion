package hito2;

import java.sql.*;
import java.util.Scanner;

public class hito2 {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        int opcion;

        do {
            System.out.println("\n ------ Cartelera Cine CampusFp Getafe ------\n");
            System.out.println("1 - Ver películas");
            System.out.println("2 - Salir");
            System.out.print("Elige una opción: ");
            opcion = sc.nextInt();

            if (opcion == 1) {
                mostrarPeliculas();
            } else if (opcion == 2) {
                System.out.println("Saliendo del programa........");
            } else {
                System.out.println("Opción no válida.");
            }
        } while (opcion != 2);

        sc.close();
    }

    // A traves de esta clase nos conectamos a la base de datos de hito2progra
    public static void mostrarPeliculas() {
        String url = "jdbc:mysql://localhost:3306/hito2progra";  // Ponemos la direccion en la que tenemos guardada la base de datos
        String usuario = "root"; // Ponemos el usuario de la base de datos que en este caso es el root
        String contrasena = "curso";  // Y la contraseña de la base de datos para poder acceder

        // Unimos las tablas de salas y peliculas
        String sql = "SELECT p.codigo, p.titulo, p.duracion, p.genero, p.nota, " +
                     "s.nombre AS sala, s.capacidad " +
                     "FROM peliculas p INNER JOIN salas s ON p.sala_id = s.id";
       
        try {
        	
            Connection conexion = DriverManager.getConnection(url, usuario, contrasena); // nos unimos a la base de datos
            Statement stmt = conexion.createStatement(); // envia consultas
            ResultSet rs = stmt.executeQuery(sql); // las ejecuta 

            System.out.println("\n ------ Cartelera Cine CampusFp Getafe ------\n");

            while (rs.next()) {
            	System.out.println("-----------------------------------");
                System.out.println("Código: " + rs.getString("codigo"));
                System.out.println("Título: " + rs.getString("titulo"));
                System.out.println("Duración: " + rs.getInt("duracion") + " minutos");
                System.out.println("Género: " + rs.getString("genero"));
                System.out.println("Nota: " + rs.getString("nota"));
                System.out.println("Sala: " + rs.getString("sala"));
                System.out.println("Capacidad: " + rs.getInt("capacidad"));
                System.out.println("-----------------------------------");
            }
            
            rs.close();
            stmt.close();
            conexion.close();

        } catch (SQLException e) {
        	// generamos un error el programa para que en caso de que no se pueda conectar con la base de datos salte el error
            System.out.println("Error al acceder a la base de datos: " + e.getMessage());
        }
    }
}
