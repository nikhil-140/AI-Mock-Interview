const express = require('express');
const cors = require('cors');

const app = express();
const PORT = process.env.PORT || 3000;

// Use CORS to allow requests from other origins
app.use(cors());

// Sample questions
const questions = [
    { question: "What is Object in JavaScript?" },
    { question: "What are the primitive data types in JavaScript?" },
    { question: "What is a closure in JavaScript?" },
    { question: "What is the purpose of 'this' keyword?" },
    { question: "Explain the concept of promises in JavaScript." },
    { question: "What is the difference between null and undefined?" },
    { question: "How does event delegation work?" }
];

// API endpoint to fetch JavaScript questions
app.get('/api/jsQuestions', (req, res) => {
    res.json({ questions });
});

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
