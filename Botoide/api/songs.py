import pytubefix as pt
import os
from pydub import AudioSegment

def get_song(url=None, name=None):
    if url:
        yt_req = pt.YouTube(url)
        stream_obj = yt_req.streams.filter(only_audio=True)
        out_fp = stream_obj[0].download(output_path="songs/") # download() retorna caminho do arquivo out_fp
    
        
        base, ext = os.path.splitext(out_fp)
        base = str(base) # Faz base ser strong-typed para str
        base = base.replace(" ", "") # Remove espaços para padronização
        new_file = base + '.mp3'
        
        print(out_fp)
        
        AudioSegment.from_file(out_fp).export(new_file, format="mp3")
        
        os.remove(out_fp)
        
        return {"title": yt_req.title, "thumb": yt_req.thumbnail_url,"filepath": new_file}
    elif name: #Request mandou nome da musica em vez do url
        pass # W.I.P