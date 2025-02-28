# Importa pacote Flask do modulo flask
from flask import Flask, render_template #as app

# Instanciando Flask no app.py
app = Flask(__name__, template_folder="views")

# Rota principal do site
@app.route("/")
# View function - Explicita o que vai ser renderizado na rota
def home():
    return render_template("index.html")

@app.route("/games")
def games():
    game = {"Title" : "Ghost of Tsushima",
            "Year": 2020,
            "Category": "Action RPG"}
    
    players = ["iruah", "davi_lambari", "edsongf"]
    return render_template("games.html", game=game, players=players)#title=title, year=year, category=category, players=players)

if __name__ == "__main__":
    # Roda servidor no localhost, porta 5000; 0.0.0.0 = rede LAN
    app.run(host="localhost", port=5000, debug=True)