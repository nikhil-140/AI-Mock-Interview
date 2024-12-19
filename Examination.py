from flask import Flask, jsonify
import cv2
import threading
import winsound

app = Flask(__name__)
status = {'face_detected': True}

def monitor_camera():
    global status
    face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')
    cap = cv2.VideoCapture(0)
    
    if not cap.isOpened():
        print("Error: Could not open camera.")
        return
    
    no_face_detected_count = 0
    
    while True:
        ret, frame = cap.read()
        if not ret:
            print("Error: Could not read frame.")
            break

        gray_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
        faces = face_cascade.detectMultiScale(gray_frame, scaleFactor=1.1, minNeighbors=5, minSize=(10, 10))

        if len(faces) > 0:
            no_face_detected_count = 0
            status['face_detected'] = True
        else:
            no_face_detected_count += 1
            if no_face_detected_count >= 30:
                status['face_detected'] = False
                frequency = 300
                duration = 1000
                winsound.Beep(frequency, duration)
                no_face_detected_count = 0

@app.route('/status')
def get_status():
    return jsonify(status)

def run_app():
    app.run(port=5000)

if __name__ == "__main__":
    threading.Thread(target=monitor_camera, daemon=True).start()
    run_app()
