let btn = document.querySelector("#btn");
let content = document.querySelector("#content");

function speak(text) {
    let text_speak = new SpeechSynthesisUtterance(text);
    text_speak.rate = 1;
    text_speak.pitch = 1;
    text_speak.volume = 1;
    text_speak.lang = "hi-GB"; // Ensure the language is set appropriately
    window.speechSynthesis.speak(text_speak);
}

function wishMe() {
    let day = new Date();
    let hours = day.getHours();
    if (hours >= 0 && hours < 12) {
        speak("Good morning");
    } else if (hours >= 12 && hours < 16) {
        speak("Good afternoon");
    } else if (hours >=16 && hours < 18){
        speak("Good evening");
    }
    else{
        speak("Good night");
    }
}

window.addEventListener('load', () => {
    wishMe();
});

let SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
let recognition = new SpeechRecognition();

recognition.onresult = (event) => {
    let currentIndex = event.resultIndex;
    let transcript = event.results[currentIndex][0].transcript;
    content.innerText = transcript;
    takeCommand(transcript.toLowerCase()); // Normalize the command
};

recognition.start(); // Start recognition

function takeCommand(command) {
    if (command.includes("hello") || command.includes("hey")) {
        speak("Hello dear, How can I help you ?");
    } else if (command.includes("who is that!")) {
        speak("I am Techex, created by Team Technocrat. Tell me how can I help you ?");
    } else if (command.includes("open youtube")) {
        window.open("https://www.youtube.com", "_blank");
        speak("Here is YouTube");
    } else if (command.includes("open google")) {
        window.open("https://www.google.com", "_blank");
        speak("Here is Google");
    } else if (command.includes("open facebook")) {
        window.open("https://www.facebook.com", "_blank");
        speak("Here is Facebook");
    }
        else if (command.includes("open whatsapp")) {
            window.open("WhatsApp://");
            speak("Here is whatsapp");
    }   else if (command.includes("calculator")) {
        window.open("Calculator://");
        speak("Here is calculator");
}  else if (command.includes("open snapchat")) {
    window.open("snapchat://");
    speak("Here is snapchat");
}else {
        speak("Sorry ! Try another query.");
    }
}
// Start recognition when button is clicked
btn.addEventListener('click', () => {
    recognition.start();
});
