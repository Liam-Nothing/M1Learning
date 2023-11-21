from flask import Flask
from flask import jsonify
import mysql.connector

app = Flask(__name__)

# Configuration de la base de données
db = mysql.connector.connect(
    host="mysql",
    user="admin",
    password="admin",
    database="library"
)

@app.route('/')
def index():
    cursor = db.cursor()
    cursor.execute("SELECT * FROM BOOK")
    result = cursor.fetchall()
    return jsonify(result)

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
