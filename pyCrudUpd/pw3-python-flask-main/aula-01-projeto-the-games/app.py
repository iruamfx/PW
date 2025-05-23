# Comentário em Python
# Importando o pacote do Flask
from flask import Flask, render_template
# Não precisa informar o tipo de varíavel, a partir do valor que damos a ela, ela recebe o seu tipo
# Carregando o Flask na variável App e Mapeamento das páginas dentro da página Views
app = Flask(__name__, template_folder='views')

# Criando a rota Principal do site
#


@app.route('/')
# Criando função no Python
# View Function: função de visualização
def home():
    return render_template('index.html')


@app.route('/games')
def games():
    # Dicionario no Python (Objeto)
    game = {'titulo': 'CSGO',
            'ano' : 2012,
            'categoria' : 'FPS Online'
            }
    jogos = ['Team Fortress 2', 'Rocket League', 'Metal Gear: Rising',
             'FC 25', 'The Legend of Zelda', 'Half-Life', 'DOOM']
    jogadores = ['Midna', 'Tr0p', 'jujudopix', 'davilambari', 'iruah']
    return render_template('games.html',
                           game = game,
                           jogadores=jogadores,
                           jogos=jogos
                           )


if __name__ == '__main__':
    # Rodando o servidor no localhost, porta 5000
    app.run(host="localhost", port=5000, debug=True)
