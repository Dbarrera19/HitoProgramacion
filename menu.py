# Importamos las funciones de nuestro archivo funciones.py
from funciones import registrar_cliente, realizar_compra, visualizar_clientes, seguimiento_pedido

# Definimos el menu principal y creamos un bucle infinito para mantener el programa activo
def menu():
    while True:
# Muestra las opciones del menú y pedimos que seleccione una opción
        print("1. Registrar cliente")
        print("2. Visualizar clientes")
        print("3. Realizar una compra")
        print("4. Seguimiento de un pedido")
        print("5. Salir")
        opcion = input("Seleccione una opción: ")
# Llamamos a la función correspondiente
        if opcion == "1":
            registrar_cliente()
        elif opcion == "2":
            visualizar_clientes()
        elif opcion == "3":
            realizar_compra()
        elif opcion == "4":
            seguimiento_pedido()
# Nos saca del bucle si elige la opción 5
        elif opcion == "5":
            print("Saliendo de la aplicación.")
            break
# Muestra un error sobre una opción no válida
        else:
            print("Opción no válida. Intente de nuevo.\n")

# Ejecutar el menú
menu()
