const settingsCog = document.getElementById('settingsCog');
const dropdownMenu = document.getElementById('dropdownMenu');
const themeToggle = document.getElementById('themeToggle');
const sunIcon = themeToggle.querySelector('.fa-brightness');
const moonIcon = themeToggle.querySelector('.fa-moon');

themeToggle.addEventListener('click', () => {
	const currentTheme = document.body.classList.contains('dark') ? 'dark' : 'light';
	const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
	switchTheme(newTheme);
});

window.addEventListener('load', () => {
	const savedTheme = localStorage.getItem('theme');
	if (savedTheme) {
		switchTheme(savedTheme);
	} else {
		switchTheme('dark');
	}
});


function switchTheme(theme) {
	if (theme === 'dark') {
		document.body.classList.add('dark');
		document.body.classList.remove('light');
		moonIcon.classList.add('active');
		sunIcon.classList.remove('active');
	} else {
		document.body.classList.add('light');
		document.body.classList.remove('dark');
		sunIcon.classList.add('active');
		moonIcon.classList.remove('active');
	}


	localStorage.setItem('theme', theme);
}


settingsCog.addEventListener('click', () => {
	dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
});


window.addEventListener('click', function (event) {
	if (!settingsCog.contains(event.target) && !dropdownMenu.contains(event.target)) {
		dropdownMenu.style.display = 'none';
	}
});