import Algo
from flask import Flask, render_template, redirect, url_for

app = Flask(__name__)
events = []



def Markers():
    a = Algo.Test4(100, 250)
    b = {}
    for key in a.keys():
        if len(key) == 1:
            skey = "0" + key
        else:
            skey = key
        if len(a[key]) == 1:
            sval = "0" + a[key]
        else:
            sval = a[key]
        
        events.append({
            "todo": "Budget check",
            "date": "2022-" + skey + "-" + sval
        },)

    print(events)
    return events


@app.route('/')
def home():
    return render_template('index-1.html')


@app.route('/calendar')
def calendar():
    Markers()
    return render_template('calendar.html',
                           events=events)
    
@app.route('/landing')
def landing():
    return render_template('LandingPage.html')


if __name__ == '__main__':
    app.run(debug=True)
