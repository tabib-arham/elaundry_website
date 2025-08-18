// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/12.1.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/12.1.0/firebase-auth.js";
import { getFirestore, doc, setDoc } from "https://www.gstatic.com/firebasejs/12.1.0/firebase-firestore.js";
import { getStorage } from "https://www.gstatic.com/firebasejs/12.1.0/firebase-storage.js";


// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyCyDd7hCgnZP9aCNQ8E5sjR5I94UbofH8U",
    authDomain: "laundry-80b86.firebaseapp.com",
    projectId: "laundry-80b86",
    storageBucket: "laundry-80b86.firebasestorage.app",
    messagingSenderId: "471998530718",
    appId: "1:471998530718:web:ff62fda40e8bf982a8e78f"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

// Function to show messages
function showMessage(message, divID) {
    var messageDiv = document.getElementById(divID);
    messageDiv.style.display = 'block';
    messageDiv.innerHTML = message;
    messageDiv.style.opacity = 1;
    setTimeout(function () {
        messageDiv.style.opacity = 0;
    }, 3000);
}

// ==================== Registration ====================
const registerBtn = document.getElementById('registerBtn');
if (registerBtn) {
    registerBtn.addEventListener('click', (event) => {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const contact = document.getElementById('contact').value;
        const email = document.getElementById('email').value;
        const location = document.getElementById('location').value;
        const password = document.getElementById('password').value;

        const auth = getAuth();
        const db = getFirestore();

        createUserWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                const user = userCredential.user;
                const userData = {
                    name: name,
                    contact: contact,
                    email: email,
                    location: location
                };
                showMessage("Registration successful! Please login to take service", 'registrationMessage');
                const docRef = doc(db, 'users', user.uid);
                setDoc(docRef, userData)
                    .then(() => {
                        setTimeout(() => {
                            window.location.href = 'log.html';
                        }, 3000); // 5 second delay before redirect
                    })
                    .catch((error) => {
                        console.error("Error writing document: ", error);
                        showMessage("Error saving user data. Please try again later.", 'registrationMessage');
                    });
            })
            .catch((error) => {
                const errorCode = error.code;
                if (errorCode === 'auth/email-already-in-use') {
                    showMessage("Email already in use. Please try another email.", 'registrationMessage');
                } else if (errorCode === 'auth/operation-not-allowed') {
                    showMessage("Unable to register. Please try again later.", 'registrationMessage');
                } else if (errorCode === 'auth/invalid-email') {
                    showMessage("Invalid email format. Please enter a valid email.", 'registrationMessage');
                } else if (errorCode === 'auth/weak-password') {
                    showMessage("Weak password. Please enter a stronger password.", 'registrationMessage');
                } else {
                    showMessage("Registration failed. Please try again later.", 'registrationMessage');
                }
            });
    });
}

// ==================== Login ====================
const loginForm = document.querySelector('.form'); // Target the login form directly
if (loginForm) {
    loginForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const auth = getAuth();

        signInWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                showMessage("Login successful! ", 'loginMessage');
                const user = userCredential.user;
                localStorage.setItem('userId', user.uid);
                setTimeout(() => {
                    window.location.href = 'userHome.html';
                }, 3000); // 5 second delay before redirect
            })
            .catch((error) => {
                const errorCode = error.code;
                if (errorCode === 'auth/user-not-found') {
                    showMessage("User not found. Please register first.", 'loginMessage');
                } else if (errorCode === 'auth/wrong-password') {
                    showMessage("Incorrect password. Please try again.", 'loginMessage');
                } else if (errorCode === 'auth/invalid-email') {
                    showMessage("Invalid email format. Please enter a valid email.", 'loginMessage');
                } else if (errorCode === 'auth/user-disabled') {
                    showMessage("User account is disabled. Please contact support.", 'loginMessage');
                } else if (errorCode === 'auth/invalid-credential') {
                    showMessage("Incorrect Email or Password!", 'loginMessage');
                } else {
                    showMessage("Login failed. Please try again.", 'loginMessage');
                }
            })
    });
};
