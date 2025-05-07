package hito2;

import java.util.Scanner;

public class principal {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        int opcion;

        do {
            // Menú
            System.out.println("\n ------ Cartelera Cine ------");
            System.out.println("1 - Ver películas");
            System.out.println("2 - Añadir película");
            System.out.println("3 - Eliminar película");
            System.out.println("4 - Modificar película");
            System.out.println("5 - Salir");
            System.out.print("Elige una opción: ");

            // Verificar que el usuario ingresa un número válido
            while (!sc.hasNextInt()) {
                System.out.println("Introduce un número válido.");
                sc.next();
            }
            opcion = sc.nextInt();
            sc.nextLine(); 

            // Opciones
            switch (opcion) {
                case 1:
                    mostrar.mostrarPeliculas();  // Mostrar las películas
                    break;
                case 2:
                    añadir.añadirPelicula(sc);  // Añadir una nueva película
                    break;
                case 3:
                    eliminar.eliminarPelicula(sc);  // Eliminar una película
                    break;
                case 4:
                    modificar.modificarPelicula(sc);  // Modificar los detalles de una película
                    break;
                case 5:
                    System.out.println("Saliendo del programa...");  // Salimos del programa
                    break;
                default:
                    System.out.println("Opción no válida.");  // Si no se elige una opcion valida muestra el mensaje
                    break;
            }
        } while (opcion != 5);  // Se repite el menu todo el rato hasta que se selecciones la opcion 5 de salir

        sc.close();  
    }
}
