import json
import sys
from datetime import datetime, timedelta

import requests
from flask import Flask, render_template, request

key_api = "93351ec71f2cadb34d0263f8218314d6"

app = Flask(__name__)

def datesforweek():
    week = []
    now = datetime.now()
    for x in range(7):
        d = now + timedelta(days=x)
        week += [d.strftime("%d/%m/%y")]
    return week

def check_city(rest):
    print(rest["message"])
    if rest["message"] == "city not found":
        print("error input city. exit")
        sys.exit()
    return

@app.route('/')
def home():
    return render_template('input.html')


@app.route('/home')
def start():
    city = request.args['CITY']  # city = "London"
    url = f'http://api.openweathermap.org/data/2.5/weather?q={city}&appid={key_api}&units=metric'
    response = requests.get(url)
    return response.json()


@app.route('/shortenurl')
def shortenurl():
    rest = start()
    print("\n\n****************************************lines*****\n",rest, "\n******lines****************************************************\n\n")
    #check_city(rest)
    lon = rest["coord"]["lon"]
    lat = rest["coord"]["lat"]
    url = f'https://api.openweathermap.org/data/2.5/onecall?lat={lat}&lon={lon}&exclude=current,minutely,hourly,alerts&appid={key_api}'
    wea_response = requests.get(url)
    wea_data = wea_response.json()
    seven_day = {}
    weekdays = datesforweek()
    for day in range(0, 7):
        seven_day[weekdays[day]] = {'max_temp': wea_data['daily'][day]['temp']['max'],
                           'min_temp': wea_data['daily'][day]['temp']['min'],
                           'humidity': wea_data['daily'][day]['humidity']}

    print("\n\n*********************************************\n",seven_day, "\n**********************************************************\n\n")
    return render_template('shortenurl.html',  jsonfile=seven_day)


if __name__ == '__main__':
    app.run()





"""
dict = data_line["daily"][0]
print(dict, "\n\n\n")
dict = data_line["daily"][1]
print(dict, "\n\n\n")

print("\n\n*********************************************\n",rest, "\n**********************************************************\n\n")

response = requests.get(url)
data_line = response.json()
dict = data_line["daily"]
"""
#json_formatted_str = json.dumps(rest, indent=2)
# return render_template('shortenurl.html', city=request.args['CITY'])
# return render_template('shortenurl.html', jsonfile=datetime.datetime.utcfromtimestamp(1656936685).strftime('%Y-%m-%d  %A'))