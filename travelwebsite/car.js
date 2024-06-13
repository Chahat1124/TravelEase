const car = document.querySelector("#search3");

car.addEventListener('submit', async function(e) {
    e.preventDefault();
    console.log("submitted");

    const pickup = document.querySelector('#dest1').value;
    const dropoff = document.querySelector('#dest2').value;

    const getPlaceId = async (location) => {
        const url = `https://sky-scanner3.p.rapidapi.com/cars/auto-complete?query=${location}`;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '4719e51519msheb0a160627f9f6bp1b0bfajsn27e135d3e22a',
                'X-RapidAPI-Host': 'sky-scanner3.p.rapidapi.com'
            }
        };

        try {
            const response = await fetch(url, options);
            const result = await response.json();
            if (result && result.data && result.data.length > 0) {
                return result.data[0].entity_id; 
            } else {
                throw new Error('No location data found');
            }
        } catch (error) {
            console.error(error);
        }
    };

    try {
        const pickupPlaceId = await getPlaceId(pickup);
        const dropoffPlaceId = await getPlaceId(dropoff);
        const picktime = document.querySelector('#picktime').value;
        const droptime = document.querySelector('#droptime').value;
        const start = document.querySelector('#start').value;
        const end = document.querySelector('#end').value;

        console.log("Pickup Place ID:", pickupPlaceId);
        console.log("Dropoff Place ID:", dropoffPlaceId);
        const searchCar = `https://sky-scanner3.p.rapidapi.com/cars/search?pickUpEntityId=${pickupPlaceId}&pickUpDate=${start}&pickUpTime=${picktime}&dropOffDate=${end}&dropOffTime=${droptime}`;
        const options = {
            method: 'GET',
            headers: {
                'X-RapidAPI-Key': '4719e51519msheb0a160627f9f6bp1b0bfajsn27e135d3e22a',
                'X-RapidAPI-Host': 'sky-scanner3.p.rapidapi.com'
            }
        };
        const searchResponse = await fetch(searchCar, options);
const searchResult = await searchResponse.json();
const resultsContainer = document.querySelector('#results');

resultsContainer.innerHTML = '';  // Clear previous results
console.log(searchResult);

if (searchResult.data && Array.isArray(searchResult.data.carList)) {
    const carList = searchResult.data.carList;
    if (carList.length > 0) {
        carList.forEach(car => {
            const name = car.car_name;
            const seat = car.max_seats;
            const price = car.mean_price;
            console.log(`Car details: ${name}, ${seat}, ${price}`);
            
            const carItem = document.createElement('div');
            carItem.className = 'car-item';
            
            const carName = document.createElement('h3');
            carName.textContent = name;
            
            const carSeats = document.createElement('p');
            carSeats.textContent = `Seats: ${seat}`;
            
            const carPrice = document.createElement('p');
            carPrice.textContent = `Price: ${price}`;

            const bookButton = document.createElement('button');
            bookButton.textContent = 'Book-now';
            bookButton.className = 'btn btn-primary'; 
           
            carItem.appendChild(carName);
            carItem.appendChild(carSeats);
            carItem.appendChild(carPrice);
            carItem.appendChild(bookButton);

            resultsContainer.appendChild(carItem);
        });
        document.querySelectorAll('.btn btn-primary').forEach(button => {
            button.addEventListener('click', async function() {
                const name = this.getAttribute('data-name');
                const seats = this.getAttribute('data-seats');
                const price = this.getAttribute('data-price');
                const pickup = document.querySelector('#picktime').value;
                const dropoff = document.querySelector('#droptime').value;
                const start = document.querySelector('#start').value;
                const end = document.querySelector('#end').value;
            
                const bookingData = {
                    name,
                    seats,
                    price,
                    pickup,
                    dropoff,
                    start,
                    end
                };

                try {
                    const response = await fetch('bookcar.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(bookingData)
                    });
                    const result = await response.text();
                    alert(result);
                } catch (error) {
                    console.error(error);
                }
            });
        });

    } else {
        // No cars found
        const noCarsMessage = document.createElement('p');
        noCarsMessage.textContent = "NO cars found at the moment";
        resultsContainer.appendChild(noCarsMessage);
    }
} else {
    console.log("NO cars found at the moment");
    const noCarsMessage = document.createElement('p');
    noCarsMessage.textContent = "NO cars found at the moment";
    resultsContainer.appendChild(noCarsMessage);
}

    } catch (error) {
        console.error(error);
    }
});