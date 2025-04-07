from flask import render_template, request
from api import songs

songlist = []

def init_app(app):
    # Rota principal do site
    @app.route("/")
    # View function - Explicita o que vai ser renderizado na rota
    def home():
        return render_template("index.html", songs=songlist)
    
    @app.route("/getsong", methods=["POST"])
    def getsong():
        if request.method == "POST":
            if request.form.get("url"):
                song = songs.get_song(url=request.form.get("url"))
                songlist.append(song)
            elif request.form.get("name"):
                songs.get_song(name=request.form.get("name"))
            else:
                return 400