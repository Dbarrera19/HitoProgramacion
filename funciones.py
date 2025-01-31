# Estructura inicial y creamos los datos donde almacenar los clientes pedidos y productos
clientes = {}
pedidos = {}
productos = {
    1: "Producto A",
    2: "Producto B",
    3: "Producto C"
}

# Función para registrar un cliente 
def registrar_cliente():
# Mensaje de inicio para comenzar er registro del cliente
    print("Registro de Cliente:")
    nombre = input("Nombre: ")
    apellidos = input("Apellidos: ")
    direccion = input("Dirección: ")
    telefono = input("Teléfono: ")
    email = input("Email: ")
# Solicita que se introduzaca los datos del cliente y le genera un ID único
# Crea un nuevo registro en clientes donde el idclientes y los valores que demos son los datos del clientes
    id_cliente = len(clientes) + 1
    clientes[id_cliente] = {
        "nombre": nombre,
        "apellidos": apellidos,
        "direccion": direccion,
        "telefono": telefono,
        "email": email
    }
    print(f"Cliente registrado con ID: {id_cliente}\n")

# Función para visualizar clientes
def visualizar_clientes():
# Verificamos en clientes si está vacio, y si lo esta nos informa que no hay clientes registrados
    if not clientes:
        print("No hay clientes registrados.\n")
# Sirve para registrar el ID y el nombre de cada cliente
    else:
        print("Clientes registrados:")
        for id_cliente, datos in clientes.items():
            print(f"ID: {id_cliente}, Nombre: {datos['nombre']} {datos['apellidos']}")
        print()

# Función para realizar una compra
def realizar_compra():
# Si el ID de clientes no existe muestra un mensaje de error
    id_cliente = int(input("Ingrese el ID del cliente: "))
    if id_cliente not in clientes:
        print("Cliente no registrado.\n")
        return
# Muestra todos los productos disponibles en "productos"
    print("Productos disponibles:")
    for id_producto, nombre in productos.items():
        print(f"{id_producto}. {nombre}")
# Solicitamos al usuario que seleccione productos poniendo sus IDs separados por comas 
    seleccion = input("Seleccione los productos (separados por comas): ")
    productos_seleccionados = seleccion.split(",")
# Creamos un nuevo pedido con un numero de pedido único con el len y guardamos los datos de "pedidos"
    numero_pedido = len(pedidos) + 1
    pedidos[numero_pedido] = {
        "id_cliente": id_cliente,
        "productos": [productos[int(p)] for p in productos_seleccionados]
    }
# Muestra un mensaje confirmando que se ha registrado bien el pedido
    print(f"Pedido realizado con el número: {numero_pedido}\n")

# Función para seguir un pedido
def seguimiento_pedido():
# Solicitamos al usuario un numero de pedido existente, y si no lo hay muestra un mensaje de error
    numero_pedido = int(input("Ingrese el número de pedido: "))
    if numero_pedido not in pedidos:
        print("Pedido no encontrado.\n")
        return 
# Recuperamos el pedido de "pedidos" y su cliente de "clientes"
    pedido = pedidos[numero_pedido]
    cliente = clientes[pedido["id_cliente"]]

# Mostramos los datos del cliente asociado al pedido 
    print("Datos del cliente:")
    print(f"Nombre: {cliente['nombre']} {cliente['apellidos']}")
    print(f"Dirección: {cliente['direccion']}")
    print(f"Teléfono: {cliente['telefono']}")
    print(f"Email: {cliente['email']}")
# Imprime los productos del pedido
    print("\nProductos del pedido:")
    for producto in pedido["productos"]:
        print(f"- {producto}")
    print()

