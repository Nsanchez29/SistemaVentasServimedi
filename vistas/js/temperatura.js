window.addEventListener('load', ()=> {

	let long;
	let lat;
	let temperatureDegree = document.querySelector('.temperature-degree');

	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(position=>{
			long = position.coords.longitude;
			lat = position.coords.latitude;

			const proxy = 'https://cors-anywhere.herokuapp.com/';
			const api = `${proxy}https://api.darksky.net/forecast/1d2a8040f377d787fe32042cff0e2bad/${lat},${long}?units=auto`;

			fetch(api)
				.then(response => {
					return response.json();
				})
				.then(data => {
					console.log(data);
					const {temperature, summary} = data.currently;
					temperatureDegree.textContent = temperature;
				});
		});
	}
});