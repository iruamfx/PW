from flask import render_template, request, url_for, redirect, flash
import os
import uuid
from models.database import db, Images


def init_app(app):
    @app.route('/')
    def home():
        return render_template('index.html')
    
    FILE_TYPES = set(['png', 'jpg', 'jpeg', 'gif'])
    def allowed_files(filename):
        return "." in filename and filename.rsplit(".", 1)[1].lower() in FILE_TYPES
     
    @app.route('/gallery', methods=['GET', 'POST'])
    def gallery():
        imagens = Images.query.all()
        
        if request.method == 'POST':
            file = request.files['img_file']
            alt = request.form.get("img_alt")
            
            if not allowed_files(file.filename):
                flash("Utilize os tipos de arquivos referentes a imagem.", 'danger')
                redirect(request.url)
                
            filename = str(uuid.uuid4())
            
            img = Images(url=filename, alt=alt)
            db.session.add(img)
            db.session.commit()
            
            file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            flash("Imagem enviada com sucesso!", 'success')
            return redirect(url_for('gallery'))

        return render_template("galeria.html", imagens=imagens)