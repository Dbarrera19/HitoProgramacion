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










#Ejercicio 2
#Empezamos asignando que nos de la máquina un numero random entre el 1 y el 3
import random
generar_numero = random.randint (1,3)
#Asignamos a cada uno de los elmentos del juego un numero entre el 1, 2 y 3
piedra = 1
papel = 2
tijera = 3
#Asignamos dos contadores uno para mi que soy persona y otro para la maquina que lo va a sacar de maner random
#Y lo asignamos en 0 para que lo inicie en ese numero
contador_maquina = 0
contador_persona = 0

#Creamos un while con los dos contadores para que solo pueda llegar el contador hasta el numero 3 y que ahi lo detenga
while contador_maquina != 3 and contador_persona != 3:

#Hacemos que aparezca un menasaje para que se eliga lo que quiere sacar la persona y lo asignamos a persona para que detecte lo que elige
    persona = int(input("Elige -1 Piedra | -2 Papel | -3 Tijera: "))

#Ahora he hecho un if para cada unad de las casuisticas dentro del juego
#Asignamos que si la persona que soy yo eligo el 1 que es piedra y la maquina aleatoriamente saca 1 asigno que salga un mesaje de que hemos empatado
#Tambien pongo un mensaje de como va el resultado que lo asignamos como los contadores que habiamos creado anteriormente
    if persona == 1 and generar_numero == 1:
        print("La maquina ha sacado Piedra.  HABEIS EMPATADO ")
        print(f"Seguís : {contador_maquina} - {contador_persona}")

#Asignamos que si la persona elige el numero 1 que es piedra y la maquina elige 2 que es papel pongo un mesaje de que ha perdido
#Además de sumarle un +1 al contador de la maquina
    elif persona == 1 and generar_numero == 2:
        print("La máquina ha sacado Papel. HAS PERDIDO :( ")
        contador_maquina = contador_maquina +1
        print(f"Has perdido vais : {contador_maquina} - {contador_persona}")
        
#Asignamos que si la persona elige el numero 1 que es piedra y la maquina elige 3 que es tijera pongo un mesaje de que ha ganado
#Y le sumamos un +1 al contador de la persona
    elif persona == 1 and generar_numero == 3:
        print("La maquina ha sacado Tijera. ¡¡¡ HAS GANADO !!! :) ")
        contador_persona = contador_persona +1
        print(f"Has ganado vais : {contador_maquina} - {contador_persona}")



    elif persona == 2 and generar_numero == 1:
        print("La maquina ha sacado Piedra. ¡¡¡ HAS GANADO !!! :)  ")
        contador_persona = contador_persona +1
        print(f"Has ganado vais : {contador_maquina} - {contador_persona}")
        


    elif persona == 2 and generar_numero == 2:
        print("La maquina ha sacado Papel.  HABEIS EMPATADO ")
        print(f"Seguís : {contador_maquina} - {contador_persona}")


    elif persona == 2 and generar_numero == 3:
        print("La maquina ha sacado Tijera. HAS PERDIDO :( ")
        contador_maquina = contador_maquina +1
        print(f"Has perdido vais : {contador_maquina} - {contador_persona}")
        


    elif persona == 3 and generar_numero == 1:
        print("La máquina ha sacado Tijera. HAS PERDIDO :( ")
        contador_maquina = contador_maquina +1
        print(f"Has perdido vais : {contador_maquina} - {contador_persona}")
        


    elif persona == 3 and generar_numero == 2:
        print("La maquina ha sacado Papel. ¡¡¡ HAS GANADO !!! :)  ")
        contador_persona = contador_persona +1
        print(f"Has ganado vais :{contador_maquina} - {contador_persona}")


    elif persona == 3 and generar_numero == 3:
        print("La máquina ha sacado Tijera HABEIS EMPATADO ")
        print(f"Seguís : {contador_maquina} - {contador_persona}")

#Con estos dos ultimos elif establecemos que cuando cualquiera de los dos contadores llegue a tres ponga un mensaje de si hemos ganado o perdido
    elif contador_maquina == 3:
        print("Has perdido, La máquina te ha ganado.")
    elif contador_persona == 3:
        print("Has ganado, ENHORABUENA.")














#Ejercicio 3
#Ponemos que el saldo sea igual al numero que pongamos cuando nos pida el saldo
#Y con el int obligamos a que sea un numero
saldo = int(input("Introduce tu saldo inicial: "))
#Ponemso un contador para que nos cuente todas las veces que ingresamos dinero o lo retiramos
contador_ingreso = 0
contador_retirada = 0
#Creamos un bucle
while True:
#Creamos 5 prints con lo que queremos que nos aparezca en el menu
    print("1 - Ingresar dinero")
    print("2 - Retirar dinero")
    print("3 - Saldo")
    print("4 - Salir")
    print("5 - Estadísticas de moviminetos")
#Le decimos que escoja una opcion
    opcion = input("Seleccione la opcion que quiera: ")
#Si elige la opcion 1 que es para ingresar dinero le decimos que cuanto quiere ingresar y con el int le obligamos a que sea un numero
    if opcion == "1":
        cantidad = int(input("Cual es la cantidad que quiere ingresar: "))
#Le decimos que si la cantidad que ha ingresado en mayor o igual que 0 se la sume al saldo y que lo registre en el saldo
        if cantidad >= 0:
            saldo = cantidad + saldo
#Una vez ingresado le pedimos que ponga un mensaje con la cantidad que ha ingresado
            print(f"Has ingresado {cantidad} euros.")
#Hacemos que sume +1 al contador de ingresos que habiamos creado anteriormente
            contador_ingreso = contador_ingreso + 1
#Con un else le decimos que si la cantidad no es mayor que 0 o 0 ponga un menasaje que no admite cantidades negativas
        else:
            print("No se admiten cantidades negativas")
#Si elige la opcion 2 que es para retirar dinero le decimos que cuanto quiere retirar y y que se lo reste a el saldo
    elif opcion == "2":
        cantidad = int(input("Cual es la cantidad que quiere retirar: "))
#Le decimos que si la cantidad que ha ingresado en mayor o igual que 0 se la reste al saldo y que lo registre en el saldo
        if cantidad >= 0:
            saldo = saldo - cantidad
#Una vez ingresado le pedimos que ponga un mensaje con la cantidad que ha retirado
            print(f"Has retirado {cantidad} euros")
#Hacemos que sume +1 al contador de retirada que habiamos creado anteriormente
            contador_retirada = contador_retirada + 1
#Con un else le decimos que si la cantidad no es mayor que 0 o 0 ponga un menasaje que no se puede quedar en numeros rojos
        else:
            print("No te puedes quedar en números rojos.")
#Le decimos que si pulsa la opcion 3 nos de el saldo que llevemos
    elif opcion == "3":
        print(f"Saldo: {saldo}")
#Le decimos que si pulsa la opcion 4 se salga del progama con un break        
    elif opcion == "4":
        print("Saliendo....")
        break
#Y que si elige la opcion 5 nos muestre el registro de movimintos
    elif opcion == "5":
        print(f"{contador_ingreso} veces has ingresado dinero. ")
        print(f"{contador_retirada} veces has retirado dinero. ")






