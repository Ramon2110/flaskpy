from datetime import datetime
import fpdf
from fpdf import FPDF
import pymongo
from reportlab.pdfgen import canvas
import pandas as pd
import subprocess
import os
import io 
from flask import Flask, render_template, request, send_file, make_response
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email.encoders import encode_base64

app=Flask(__name__)
nombre=""
correo=""
client = pymongo.MongoClient("mongodb+srv://Ramon:birthmark211098@flask-kcalg.mongodb.net/test?retryWrites=true&w=majority")
historial = client.historialFlask.Flask

def respuesta():
	archivo= open ('logFlask.txt','r')
	respuesta=archivo.read()
	return respuesta
def consulta():
	archivo = open ('historial.txt','r')
	historial=archivo.read()
	return historial
def excel():
	respuesta()
	df = pd.read_csv('logFlask.txt')
	df.to_excel("lista.xlsx")
	cadena="lista.xlsx"
	return cadena
def pdf():
	texto=respuesta()
	with open ("logFlask.txt", "r", encoding="utf-8") as myfile:
		data=myfile.read().replace('\n', ' ')
		myfile.close()
	pdf=FPDF()
	pdf.add_page()
	pdf.set_font("Arial", size=12)
	pdf.set_margins(10,10,10)
	pdf.multi_cell(0,6,txt=data)
	pdf.ln(h="")
	pdf.output("salidaPDF.pdf", "f")
	cadena="salidaPDF.pdf"
	return cadena
@app.route("/")
def home():
	return  render_template('home.php');

@app.route("/index.php", methods=['GET', 'POST'])
def entra():
	global nombre, correo
	nombre= request.form['nombre']
	correo= request.form['correo']
	return  render_template('index.php', nombre=nombre, correo=correo);

@app.route("/comando.php", methods=['GET', 'POST'])
def ejecuta():
	cant=1
	cadena="Error"
	
	comando=request.form['comando']
	formato=request.form['formato']
	where=request.form['where']
	now = datetime.now()
	if(comando!="Elige un comando"):
		os.system(comando+"> logFlask.txt")
		resp=respuesta()
		resultado=str(subprocess.check_output(comando))
		print (nombre)
		print (correo)
		print (formato)
		print (where)
		ts = now.strftime('%d/%m/%Y - %H:%M:%S')
		comando = {'nombre':nombre, 'correo':correo, 'comando':comando, 'timestamp':ts}
		try:
			historial.insert_one(comando)
		except Exception as e:
			print ("Error ", e)

	if(formato=="excel"):
		archivo=excel()
	elif (formato=="pdf"):
		archivo=pdf()
	if (where=="CORREO"):
		msg=MIMEMultipart()
		message="Flask"
		password="flaskpython2019"
		msg['From'] = "flaskpythonso@gmail.com"
		msg['To']=correo
		msg['Subject']="Resultado flask"
		adjunto = MIMEBase('aplication', 'octet-stream')
		adjunto.set_payload(open(archivo, "rb").read())
		encode_base64(adjunto)
		adjunto.add_header('Content-Disposition', 'attachment; filename="%s"' % os.path.basename(archivo))
		msg.attach(MIMEText(message, 'plain'))	
		msg.attach(adjunto)
		
		server = smtplib.SMTP('smtp.gmail.com: 587')
		server.starttls()
		server.login(msg['From'], password)
		server.sendmail(msg['From'], msg['To'], msg.as_string())
		server.quit()
		cadena="Correo enviado"
	elif (where=="DESCARGAR"):
		if(formato=="pdf"):
			return send_file(archivo, attachment_filename="respuesta.pdf")
		elif (formato=="excel"):
			mensaje=respuesta()
			output=make_response(mensaje)
			output.headers["Content-Disposition"]="attachment; filename=respuesta.csv"
			output.headers["Content-type"]="text/csv"
			return output
	elif (where=="HISTORIAL"):
		try:
			cadena=historial.find({'correo':correo})
			file=open("historial.txt","w")
			cant = historial.count_documents({'correo':correo})
			for p in cadena:
				file.write(" "+ str(p['comando']) + "   " + str(p['timestamp']) + os.linesep)
				print(p)
			file.close()
			cadena=consulta()
		except Exception as e:
			print ("Error ", e)
	return render_template('comando.php', cant=cant, cadena=cadena );

if __name__ == "__main__":
	app.run(host='0.0.0.0')

