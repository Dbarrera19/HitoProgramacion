#Hito 1 de programacion
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
while True:

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


    elif contador_maquina == 3:
        print("Has perdido, La máquina te ha ganado.")
    elif contador_persona == 3:
        print("Has ganado, ENHORABUENA.")





    