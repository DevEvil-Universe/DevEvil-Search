const safeSearchDropdown = document.querySelector('select[name="safeSearch"]');
const safeInput = document.getElementById('safeInput');


safeSearchDropdown.addEventListener('change', function () {
	safeInput.value = safeSearchDropdown.value;
});

const urlParams = new URLSearchParams(window.location.search);
const safeSearchValue = urlParams.get('safe') || 'active';
safeSearchDropdown.value = safeSearchValue;
safeInput.value = safeSearchValue;

const locDropdown = document.querySelector('select[name="location"]');
const locInput = document.getElementById('locInput');


locDropdown.addEventListener('change', function () {
	locInput.value = locDropdown.value;
});

const urlParams2 = new URLSearchParams(window.location.search);
const locSearchValue = urlParams.get('cr') || 'countryUS';
locDropdown.value = locSearchValue;
locInput.value = locSearchValue;