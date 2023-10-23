import secrets
import string
import argparse
import pyperclip  # Import de la bibliothèque pyperclip

def generate_password(length):
    alphabet = string.ascii_letters + string.digits + string.punctuation
    secure_password = ''.join(secrets.choice(alphabet) for _ in range(length))
    return secure_password

def copy_to_clipboard(password):
    pyperclip.copy(password)  # Copier le mot de passe dans le presse-papiers
    print("Mot de passe copié dans le presse-papiers.")

def main():
    parser = argparse.ArgumentParser(description='Générateur de mots de passe sécurisés')
    parser.add_argument('--length', type=int, default=12, help='Longueur du mot de passe (par défaut : 12)')
    parser.add_argument('--copy', action='store_true', help='Copier le mot de passe dans le presse-papiers')
    args = parser.parse_args()
    
    if args.length <= 0:
        print("La longueur du mot de passe doit être supérieure à zéro.")
        return
    
    password = generate_password(args.length)
    print("Mot de passe sécurisé généré :")
    print(password)
    
    if args.copy:
        copy_to_clipboard(password)  # Copier le mot de passe si l'option --copy est spécifiée

if __name__ == "__main__":
    main()
