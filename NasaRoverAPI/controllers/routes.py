from flask import render_template, request, url_for, redirect
import urllib
import json
import random

def init_app(app):
    rovers = ["Curiosity", "Opportunity", "Spirit"]
    #cameras_general = ["FHAZ", "MAST", "MARDI", "NAVCAM"]
    #cameras_special = ["PANCAM", "MINITES"]  # somente para Opp & Spirit

    @app.route('/')
    def home():
        return apirover()

    
    @app.route('/apirover', methods=['GET', 'POST'])
    @app.route('/apirover/<rover>/<int:sol>/<cam>/<int:id>', methods=['GET', 'POST'])
    def apirover(rover=None, sol=None, cam="MAST", id=None):
    # --- Case 1: no rover passed (random query, home route) ---
        if not rover:
            max_attempts = 5
            attempts = 0
            imgList = {"photos": []}

            while attempts < max_attempts:
                attempts += 1

                rover = random.choice(rovers)
                sol = random.randint(900, 1000)

                #if rover in ["Opportunity", "Spirit"]:
                #    cam = random.choice(cameras_general + cameras_special)
                #else:
                #    cam = random.choice(cameras_general)

                print(f"Attempt {attempts}: {rover}, {sol}, {cam}")

                url = f'https://api.nasa.gov/mars-photos/api/v1/rovers/{rover}/photos?api_key=q6QvhlV9uKm1xX22Ek8cJ0kE4JAXyaHkj33wdT7F&sol={sol}&camera={cam}'
                response = urllib.request.urlopen(url)
                apiData = response.read()
                imgList = json.loads(apiData)

                # Check only if it's random
                if "photos" in imgList and len(imgList["photos"]) >= 10:
                    break
                else:
                    rover = None  # reset so next loop generates new params

            # If after max attempts still not enough images, return "no results"
            if len(imgList.get("photos", [])) < 10:
                return "Não foi possível encontrar imagens suficientes após várias tentativas."

        # --- Case 2: rover passed manually in URL ---
        else:
            url = f'https://api.nasa.gov/mars-photos/api/v1/rovers/{rover}/photos?api_key=q6QvhlV9uKm1xX22Ek8cJ0kE4JAXyaHkj33wdT7F&sol={sol}&camera={cam}'
            response = urllib.request.urlopen(url)
            apiData = response.read()
            imgList = json.loads(apiData)

        # --- Handle optional image ID ---
        if id:
            imgInfo = []
            for img in imgList.get("photos", []):
                if img['id'] == id:
                    imgInfo = img
                    break

            if imgInfo:
                return render_template('imageinfo.html', imgInfo=imgInfo)
            else:
                return f'Imagem com a ID {id} não foi encontrada.'

        return render_template('apirover.html', imgList=imgList.get("photos", []))



