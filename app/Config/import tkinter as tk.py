
precios = {
    "I1": 50,
    "I2": 25,
    "I3": 20,
    "I4": 70,
    "I5": 12,
    "I6": 10,
    "I7": 35,
    "I8": 50,
    "P1": 95,
    "P2": 125,
    "P3": 72
}

print("                               PUNTO DE VENTA")
print(" ")
print("                               MENU Y PRECIOS")
print(" ")
print("                  ALIMENTOS                       BEBIDAS")
print("             Hamburguesa.....$50             Refresco........$20")
print("             Papas...........$25             Agua............$10")
print("             Pizza...........$70             Yogurt..........$12")
print("             Nuggets.........$35")
print("             Ensalada........$50")
print("                                   PAQUETES")
print(" ")
print("         PAQUETE 1                  PAQUETE 2                  PAQUETE 3")
print("          incluye:                   incluye:                   incluye:")
print("      -una Hamburguesa             -una Pizza                -una Ensalada")
print("      -unas Papas                  -orden de Nuggets         -un Yogurt")
print("      -un Refresco                 -un Refresco              -una Agua")
print(" ")


ta = int(input("Ingrese el número total de alimentos, bebidas y paquetes: "))

subtotal = 0

if ta >= 1:
    c1 = input("Ingrese la primera petición: ").strip()
    if c1 in precios:
        subtotal += precios[c1]
    else:
        print(f"'{c1}' no es una opción válida.")

if ta >= 2:
    c2 = input("Ingrese la segunda petición: ").strip()
    if c2 in precios:
        subtotal += precios[c2]
    else:
        print(f"'{c2}' no es una opción válida.")

if ta >= 3:
    c3 = input("Ingrese la tercera petición: ").strip()
    if c3 in precios:
        subtotal += precios[c3]
    else:
        print(f"'{c3}' no es una opción válida.")

if ta >= 4:
    c4 = input("Ingrese la cuarta petición: ").strip()
    if c4 in precios:
        subtotal += precios[c4]
    else:
        print(f"'{c4}' no es una opción válida.")

if ta >= 5:
    c5 = input("Ingrese la quinta petición: ").strip()
    if c5 in precios:
        subtotal += precios[c5]
    else:
        print(f"'{c5}' no es una opción válida.")

if ta >= 6:
    c6 = input("Ingrese la sexta petición: ").strip()
    if c6 in precios:
        subtotal += precios[c6]
    else:
        print(f"'{c6}' no es una opción válida.")

if ta >= 7:
    c7 = input("Ingrese la séptima petición: ").strip()
    if c7 in precios:
        subtotal += precios[c7]
    else:
        print(f"'{c7}' no es una opción válida.")

if ta >= 8:
    c8 = input("Ingrese la octava petición: ").strip()
    if c8 in precios:
        subtotal += precios[c8]
    else:
        print(f"'{c8}' no es una opción válida.")

if ta >= 9:
    c9 = input("Ingrese la novena petición: ").strip()
    if c9 in precios:
        subtotal += precios[c9]
    else:
        print(f"'{c9}' no es una opción válida.")

if ta >= 10:
    c10 = input("Ingrese la décima petición: ").strip()
    if c10 in precios:
        subtotal += precios[c10]
    else:
        print(f"'{c10}' no es una opción válida.")

# Calcular el total con IVA
iva = subtotal * 0.16
total = subtotal + iva

# Mostrar el total
print(f"Subtotal: ${subtotal:.2f}")
print(f"IVA (16%): ${iva:.2f}")
print(f"Total a pagar: ${total:.2f}")
