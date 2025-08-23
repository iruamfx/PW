from flask import render_template, request, url_for, redirect
import urllib
import json
import random

def init_app(app):
    rovers = ["Curiosity", "Opportunity", "Spirit"]
    cameras_general = ["FHAZ", "MAST", "MARDI", "NAVCAM"]
    cameras_special = ["PANCAM", "MINITES"]  # somente para Opp & Spirit


    @app.route('/')
    def home():
        return apirover()

    IMAGES_QNT = 5

    @app.route('/apirover', methods=['GET', 'POST'])
    @app.route('/apirover/<rover>', methods=['GET', 'POST'])
    def apirover(rover=None):
        #rovers = ["Curiosity", "Opportunity", "Spirit"]
        rovers = ["Curiosity"]
        cameras = ["FHAZ", "MAST", "MARDI", "NAVCAM"]
        IMAGES_QNT = 5

        if not rover:
            rover = random.choice(rovers)
            print(rover)

        imgList = []

        attempts = 0
        while len(imgList) < IMAGES_QNT and attempts < 20:
            attempts += 1
            cam = random.choice(cameras)
            sol = random.randint(900, 1000)

            url = f'https://api.nasa.gov/mars-photos/api/v1/rovers/{rover}/photos?api_key=q6QvhlV9uKm1xX22Ek8cJ0kE4JAXyaHkj33wdT7F&sol={sol}&camera={cam}'
            response = urllib.request.urlopen(url)
            apiData = response.read()
            data = json.loads(apiData)

            photos = data.get("photos", [])
            if photos:
                # pick one random photo from this sol/camera
                img = random.choice(photos)
                # avoid duplicates
                if img['id'] not in [i['id'] for i in imgList]:
                    imgList.append(img)

        if len(imgList) < IMAGES_QNT:
            return f"Não foi possível encontrar {IMAGES_QNT} imagens únicas de diferentes câmeras/sols."

        return render_template('apirover.html', imgList=imgList, rover=rover)
    
    @app.route('/fullimg', methods=['GET'])
    def fullimg():
        img_src = request.args.get('img_src')
        sol = request.args.get('sol')
        earth_date = request.args.get('earth_date')
        camera_name = request.args.get('camera_name')
        rover_name = request.args.get('rover_name')
        img_id = request.args.get('img_id')

        return render_template('fullimg.html', 
                            img_src=img_src, 
                            sol=sol, 
                            earth_date=earth_date, 
                            camera_name=camera_name, 
                            rover_name=rover_name,
                            img_id=img_id)
