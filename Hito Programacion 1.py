#Hito 1 de programación
#Ejercicio 1
#Comenzamos definiendo el menu con lo que queremos que aparezca en el.
def menu():
    print("Seleccione la opcion que quiere: ")
    print("1. Cuadrado")
    print("2. Rectangulo")
    print("3. Salir")


#Definimos calcular en el cuadrado el area con su operación y el perimetro con la suya.
#Después hacemo un return para que una vez se haya hecho la operacion ambos valores vuelvan
def calcular_cuadrado(lado):
    area_cuadrado = lado * lado
    print(f"El area del cuadrado es: {area_cuadrado}")
    perimetro_cuadrado = 4 * lado
    print(f"El perimetro del cuadrado es: {perimetro_cuadrado}" )
    return area_cuadrado, perimetro_cuadrado
#Definimos la forma de la figura con un range para que haga la forma con los "#"
def forma_cuadrado(lado):
    for i in range(lado):
        print("*" * lado)


#Definimos calcular en el rectangulo el area con su operación y el perimetro con la suya.
#Después hacemo un return para que una vez se haya hecho la operacion ambos valores vuelvan
#Y con los prints hacemos que aparezca el mensaje de cual es el perimetro y la altura ya calculados
def calcular_rectangulo(base, altura):
    area_rectangulo = base * altura
    print(f"El area del rectangulo es: {area_rectangulo}")
    perimetro_rectangulo = 2* (base + altura)
    print(f"El perimetro del rectangulo es:{perimetro_rectangulo} ")
    return area_rectangulo, perimetro_rectangulo

#Definimos la forma de la figura con un range para que haga la forma con los "#"
def forma_rectangulo(base, altura):
    for i in range(altura):
        print("*" * base)


#Utilizamos un bucle que se repita todo hasta que haya un break
while True:
#Seleccionamos con un input las opciones que queremos que aparezcan dentro del menú
    menu()
    opcion = input("Selecciones su figura (1 o 2) o 3 para salir: ")

#Asigamos que si elegimos la opcion 1 nos pida la longitud del cuadrado
    if opcion == "1":
        lado = int(input("Ingresa la longitud del lado del cuadrado: "))
        forma_cuadrado(lado)
        calcular_cuadrado(lado)

#Asignamos que si elegimos la opcion 2 nos calcule el rectangulo y que nos pida la longitud de la base y la altura
    elif opcion == "2":
        base = int(input("Ingresa la base del rectangulo: "))
        altura = int(input("Ingresa la altura del rectrangulo: "))
        forma_rectangulo(base, altura)
        calcular_rectangulo(base, altura)

#Asignamos que si elegimos la opcion 3 haga un break para cerrar el programa y que aparezca un mensaje de salido...
    elif opcion == "3":
        print(f"Saliendo...")
        break
#Creamos un else para que en caso de que no se ponga ninguna de las 3 opciones te diga que la opción no es válida
    else:
        print("Opción no válida")
