document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('#modal');
    const overlay = document.querySelector('#fondo');
    const weatherTitle = document.querySelector('#titulo');
    const forecastTable = document.querySelector('#pronostico');
    const webcamElement = document.querySelector('#skycam');
    const closeBtn = document.querySelector('#cerrarModal');

    async function getWeatherData(latitude, longitude) {
        try {
            const weatherResponse = await fetch(`https://api.weatherusa.net/v1/forecast?q=${latitude},${longitude}&daily=0&units=e&maxtime=1d`);
            return await weatherResponse.json();
        } catch (error) {
            console.error('Error fetching weather:', error);
            return [];
        }
    }

    async function getWebcamData(latitude, longitude) {
        try {
            const webcamResponse = await fetch(`https://api.weatherusa.net/v1/skycams?q=${latitude},${longitude}`);
            const data = await webcamResponse.json();
            return data[0]?.image || '';
        } catch (error) {
            console.error('Error fetching webcam:', error);
            return '';
        }
    }

    function fahrenheitToCelsius(fahrenheit) {
        return ((fahrenheit - 32) * 5 / 9).toFixed(1);
    }

    function createForecastRow(forecast) {
        const row = document.createElement('tr');
        const tempCelsius = fahrenheitToCelsius(forecast.temp);
        
        row.innerHTML = `
            <td>${forecast.localtime}</td>
            <td>${tempCelsius}</td>
            <td>${forecast.wdir_compass}</td>
            <td>${forecast.wspd}</td>
            <td>${forecast.wx_str}</td>
        `;
        return row;
    }

    function toggleModal(show = true) {
        const action = show ? 'remove' : 'add';
        modal.classList[action]('hidden');
        overlay.classList[action]('hidden');
        document.body.style.overflow = show ? 'hidden' : '';
    }

    async function updateWeatherDisplay(state) {
        weatherTitle.innerHTML = `<b><i>${state.getAttribute('title')}</i></b>`;
        
        const lat = state.getAttribute('data-lat');
        const lon = state.getAttribute('data-lon');
        
        const weatherData = await getWeatherData(lat, lon);
        forecastTable.innerHTML = '';
        weatherData.forEach(forecast => {
            forecastTable.appendChild(createForecastRow(forecast));
        });
        
        const webcamUrl = await getWebcamData(lat, lon);
        webcamElement.src = webcamUrl;
    }

    document.querySelectorAll('area').forEach(state => {
        state.addEventListener('click', async (e) => {
            e.preventDefault();
            toggleModal(true);
            await updateWeatherDisplay(state);
        });
    });

    closeBtn.addEventListener('click', () => toggleModal(false));
    overlay.addEventListener('click', () => toggleModal(false));
    
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') toggleModal(false);
    });
});
