# PhpMyAdmin Error

- Error :

        MySQL a répondu : Documentation
        Connexion impossible : paramètres incorrects.
        mysqli::real_connect(): php_network_getaddresses: getaddrinfo for mysql failed: Temporary failure in name resolution
        mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo for mysql failed: Temporary failure in name resolution
        phpMyAdmin a tenté de se connecter au serveur MySQL, et le serveur a rejeté la connexion. Merci de vérifier les valeurs de host, username et password dans la configuration et de s'assurer qu'elles correspondent aux informations fournies par l'administrateur du serveur MySQL.

- Solution :

    - Stop all container : `docker stop $(docker ps -q)`
    - Delete all container : `docker container prune`
    - Remove docker volume : `docker volume rm ex-24_db-data`
    - Re try : `docker-compose up -d`