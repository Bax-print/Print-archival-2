(function () {
	const menuToggle = document.querySelector('.menu-toggle');

	if (!menuToggle) {
		return;
	}

	function closeMenu() {
		document.body.classList.remove('menu-open');
		menuToggle.setAttribute('aria-expanded', 'false');
	}

	menuToggle.addEventListener('click', function () {
		const isOpen = document.body.classList.toggle('menu-open');
		menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && document.body.classList.contains('menu-open')) {
			closeMenu();
		}
	});

	window.addEventListener('resize', function () {
		if (window.innerWidth > 980) {
			closeMenu();
		}
	});
})();
