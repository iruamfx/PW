from flask import render_template, request

def init_app(app):
    # Rota principal do site
    @app.route("/")
    # View function - Explicita o que vai ser renderizado na rota
    def home():
        return render_template("index.html")
    
    players = ["iruah", "davi_lambari", "edsongf"]
    
    gamelist = [{"Title" : "Ghost of Tsushima",
                "Year": 2020,
                "Category": "Action RPG"}]
    
    conslist = [{"Name": "Xbox Series S",
                    "Price": "R$2600",
                    "Country": "USA"}]

    @app.route("/games", methods=["GET", "POST"])
    def games():
        
        if request.method == "POST":
            if request.form.get("player"): #Name do input
                players.append(request.form.get("player"))
        
        return render_template("games.html", game=gamelist[0], players=players)#title=title, year=year, category=category, players=players)
    
    @app.route("/cadgames", methods=["GET", "POST"])
    def cadgames():
        if request.method == "POST":
            if request.form.get("title") and request.form.get("year") and request.form.get("category"):
                gamelist.append({"Title": request.form.get("title"), 
                                 "Year": request.form.get("year"),
                                 "Category": request.form.get("category")})

        return render_template("cadgames.html", gamelist=gamelist)
    
    @app.route("/cadconsoles", methods=["GET", "POST"])
    def cadconsoles():
        if request.method == "POST":
            if request.form.get("name") and request.form.get("price") and request.form.get("country"):
                conslist.append({"Name": request.form.get("name"), 
                                 "Price": "R$" + request.form.get("price"),
                                 "Country": request.form.get("country")})

        return render_template("cadconsoles.html", conslist=conslist)