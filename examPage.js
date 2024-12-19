function startDictation(textAreaId) {
    if ('webkitSpeechRecognition' in window) {
        const recognition = new webkitSpeechRecognition();
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.lang = 'en-US';

        recognition.start();

        recognition.onresult = function(event) {
            document.getElementById(textAreaId).value = event.results[0][0].transcript;
            recognition.stop();
        };

        recognition.onerror = function(event) {
            alert('Error occurred in recognition: ' + event.error);
            recognition.stop();
        }
    } else {
        alert('Speech Recognition is not supported in this browser. Please try Google Chrome.');
    }
}

 // Timer functionality
 let timeLeft = 180; // Set timer for 180 seconds (3 minutes)
 const timerElement = document.getElementById('time');
 const submitButton = document.getElementById('submitBtn');

 const countdown = setInterval(() => {
     timeLeft--;
     timerElement.textContent = timeLeft;

     if (timeLeft <= 0) {
         clearInterval(countdown);
         alert('Time is up! Submitting your answers.');
         submitButton.click(); // Simulate submit action when time is up
     }
 }, 1000);