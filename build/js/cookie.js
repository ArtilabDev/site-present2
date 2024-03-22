document.addEventListener('DOMContentLoaded', function () {
    const isDefiPage = document.body.classList.contains('page-defi');
    const hasAcceptedTerms = document.cookie.indexOf('term_of_services_confirm') !== -1;
    const hasAcceptedCookies = document.cookie.indexOf('cookie-accept') !== -1;
    const hasDeniedCookies = document.cookie.indexOf('cookie_denied') !== -1;

    if (isDefiPage && !hasAcceptedTerms) {
        const modalElement = document.querySelector('#modal-terms');
        if (modalElement) {
            modalElement.classList.add('active');
            document.body.classList.add('open-modal');
        }
    }

    if (hasAcceptedTerms) {
        const elementsToDisable = document.querySelectorAll('.d-checkbox_input, .confirm-terms');
        elementsToDisable.forEach(element => element.classList.add('disabled_btn'));
    }

    if (!hasAcceptedCookies && !hasDeniedCookies) {
        const popupCookies = document.querySelector('.popup-cookies');
        if (popupCookies) {
            popupCookies.style.display = 'flex';
        }
    }

    document.addEventListener('click', function (event) {
        if (event.target.id === 'cookie_deny') {
            const expirationDate = new Date();
            expirationDate.setDate(expirationDate.getDate() + 7);

            document.cookie = "cookie_denied=true; expires=" + expirationDate.toUTCString() + "; path=/";

            const popupCookies = document.querySelector('.popup-cookies');
            if (popupCookies) {
                popupCookies.style.display = 'none';
            }
        }
    });
});
