from flask import render_template, request

def init_app(app):
    # Rota principal do site
    @app.route("/")
    # View function - Explicita o que vai ser renderizado na rota
    def home():
        return render_template("index.html")

    @app.route("/games", methods=["GET", "POST"])
    def games():
        game = {"Title" : "Ghost of Tsushima",
                "Year": 2020,
                "Category": "Action RPG"}
        
        players = ["iruah", "davi_lambari", "edsongf"]
        
        if request.method == "POST":
            if request.form.get("player"): #Name do input
                players.append(request.form.get("player"))
        
        return render_template("games.html", game=game, players=players)#title=title, year=year, category=category, players=players)