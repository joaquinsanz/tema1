# Loteria primitiva

- Debes realizar una pequeña aplicación para rellenar apuestas de lotería primitiva.
- Usa POO. Toda la aplicación debe basarse en el uso de una clase App.
- Método index, por defecto, muestra una tabla de 49 números (7x7) con las posibles apuestas.
- La apuesta elaborada se guarda en una variable de sesión.
- Cada vez que hacemos click en un número este se añade o elimina de la apuesta en juego (?method=toggle&number=X).
- En todo momento debe mostrarse el total de números en la apuesta y un mensaje adecuado:
    - Si no se llega a 6 números debe haber un mensaje de apuesta incompleta.
    - Si hay 6 números apuesta simple completa.
    - Si hay más de 6 números apuesta múltiple completa.
- Los números incluídos en la apuesta deben aparecer sombreados o coloreados (agregar o no una clase css).
- Debe haber un método flush (?method=flush) para reiniciar la apuesta.

## Posibles mejoras:

- Calcular el total de apuestas en caso de apuestas múltiples.

    N.Apuestas = n!/(m! * (n-m)!) = n! / (6! * (n-6)!)
