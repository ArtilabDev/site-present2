document.addEventListener('DOMContentLoaded', function () {
	document.addEventListener('click', function (event) {
		if (event.target.id === 'term_button_confirm') {
			let modalConfirm = event.target.closest('.modal-confirm');
			let checkbox = modalConfirm.querySelector('input');

			if (checkbox.checked) {
				let userId = generateUserId();
				let termsAccept = true;
				createCookie('term_of_services_confirm', 'true', 30);
				addUserToDatabase(userId, termsAccept, '');
				
				removeCursor();
				appendCursor();
				let cursor = document.querySelectorAll(".sticky-cursor");
				new StickyCursor(cursor);
			}
		}

		if (event.target.id === 'cookie_accept') {
			let userId = '';

			if (document.cookie.indexOf('term_of_services_confirm') === -1) {
				userId = generateUserId();
			}

			let cookieAccept = true;

			createCookie('cookie-accept', 'true', 30);
			addUserToDatabase(userId, '', cookieAccept);

			let popupCookies = document.querySelector('.popup-cookies');

			if (popupCookies) {
				popupCookies.style.display = 'none';
			}
		}
	});

	function generateUserId() {
		return Math.random().toString(36).substr(2, 9);
	}

	function createCookie(name, value, days) {
		let expires = '';
		if (days) {
			let date = new Date();
			date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
			expires = '; expires=' + date.toUTCString();
		}
		document.cookie = name + '=' + value + expires + '; path=/';
	}

	function addUserToDatabase(userId = '', termsAccept, cookieAccept) {
		let xhr = new XMLHttpRequest();

		xhr.open('POST', ajax_cookie.ajax_url, true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				let response = JSON.parse(xhr.responseText);

				if (response) {
					let userIdContainer = document.querySelector('.user-id-container');
					userIdContainer.insertAdjacentHTML('beforeend', response);
					
					removeCursor();
					appendCursor();
					let cursor = document.querySelectorAll(".sticky-cursor");
					new StickyCursor(cursor);
				} else {
					alert('Error displaying user ID.');
				}
			}
		};

		let data =
			'action=add_user_id_and_ip_to_database' +
			'&user_id=' +
			userId +
			'&terms_of_service=' +
			termsAccept +
			'&cookie_accept=' +
			cookieAccept;

		xhr.send(data);
	}

	function appendCursor() {
		document
			.querySelector('.page-wrapper')
			.insertAdjacentHTML(
				'beforeend',
				'<div class="cursor cursor--large"></div>' +
					'<div class="cursor cursor--small"></div>'
			);
	}

	function removeCursor() {
		document.querySelectorAll('.cursor').forEach(function (cursor) {
			cursor.remove();
		});
	}
});
