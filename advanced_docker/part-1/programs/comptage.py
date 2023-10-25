import sys

# Vérifiez s'il y a un argument passé
if len(sys.argv) != 2:
    print("Utilisation : python compter_voyelles.py 'votre phrase'")
    sys.exit(1)

# Récupérez la phrase passée en argument
phrase = sys.argv[1]

# Définition des voyelles
voyelles = "aeiouAEIOU"

# Initialisez un compteur de voyelles
compteur = 0

# Parcourez la phrase pour compter les voyelles
for lettre in phrase:
    if lettre in voyelles:
        compteur += 1

# Affichez le résultat
print(f"Nombre de voyelles dans la phrase : {compteur}")