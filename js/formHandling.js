const contactForm = document.getElementById('contact-form');

const submitForm = (event) => {
    let hcaptchaInput = document.querySelector('[name=h-captcha-response]');
    if (hcaptchaInput.value === "") {
        event.preventDefault();
        alert("Por favor completa la verificacion captcha");
    }
}

contactForm.addEventListener('submit', submitForm);