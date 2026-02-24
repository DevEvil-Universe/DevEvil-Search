async function setRandomBackground() {
	try {
		const response = await fetch('http://localhost:5000/api/background');
		const data = await response.json();

		document.getElementById('background').style.backgroundImage = `url(${data.imageUrl})`;
		document.getElementById('credit').innerHTML = `Photo by <a href="${data.profileUrl}" target="_blank" style="color: white; text-decoration: underline;">${data.photographer}</a> on <a href="https://www.pexels.com" target="_blank" style="color: white; text-decoration: underline;">Pexels</a>`;
	} catch (error) {
		console.error('Failed to load background image:', error);
		document.getElementById('credit').innerText = 'Failed to load image credit.';
	}
}

setRandomBackground();
