// script.js

document.addEventListener('DOMContentLoaded', () => {
    const signUpButton = document.getElementById('signUpButton');
    const signInButton = document.getElementById('signInButton');
    const forgotPasswordLink = document.getElementById('forgotPasswordLink');
    const backToSignInLink = document.getElementById('backToSignIn');
    
    const signupContainer = document.getElementById('signup');
    const signInContainer = document.getElementById('signIn');
    const forgotPasswordContainer = document.getElementById('forgotPassword');

    // Show Sign Up page
    signUpButton.addEventListener('click', () => {
        signupContainer.style.display = 'block';
        signInContainer.style.display = 'none';
        forgotPasswordContainer.style.display = 'none';
    });

    // Show Sign In page
    signInButton.addEventListener('click', () => {
        signupContainer.style.display = 'none';
        signInContainer.style.display = 'block';
        forgotPasswordContainer.style.display = 'none';
    });

    // Show Forgot Password page
    forgotPasswordLink.addEventListener('click', () => {
        signupContainer.style.display = 'none';
        signInContainer.style.display = 'none';
        forgotPasswordContainer.style.display = 'block';
    });

    // Back to Sign In page
    backToSignInLink.addEventListener('click', () => {
        signupContainer.style.display = 'none';
        signInContainer.style.display = 'block';
        forgotPasswordContainer.style.display = 'none';
    });
});
