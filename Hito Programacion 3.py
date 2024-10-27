saldo = int(input("Introduce tu saldo inicial: "))
contador_ingreso = 0
contador_retirada = 0

while True:
    print("1 - Ingresar dinero")
    print("2 - Retirar dinero")
    print("3 - Saldo")
    print("4 - Salir")
    print("5 - Estadísticas de moviminetos")

    opcion = input("Seleccione la opcion que quiera: ")

    if opcion == "1":
        cantidad = int(input("Cual es la cantidad que quiere ingresar: "))
        if cantidad > 0:
            saldo = cantidad + saldo
            print(f"Has ingresado {cantidad} euros.")
            contador_ingreso = contador_ingreso + 1
        else:
            print("No se admiten cantidades negativas")
    
    elif opcion == "2":
        cantidad = int(input("Cual es la cantidad que quiere retirar: "))
        if cantidad > 0:
            saldo = cantidad - saldo
            print(f"Has retirado {cantidad} euros")
            contador_retirada = contador_retirada + 1
        else:
            print("No te puedes quedar en números rojos.")
    
    elif opcion == "3":
        print(f"Saldo: {saldo}")

    elif opcion == "4":
        print("Saliendo....")
        break

    elif opcion == "5":
        print(f"{contador_ingreso} veces has ingresado dinero. ")
        if contador_ingreso == 1:
            print(f"{contador_ingreso} vez has ingresado dinero. ")
        print(f"{contador_retirada} veces has retirado dinero. ")
        if contador_retirada == 1:
            print(f"{contador_retirada} vez ha ingresado dinero. ")