const form = document.querySelector('#search');
const from = document.querySelector('#from');
const to = document.querySelector('#to');
const flightRes=document.querySelector("#flightRes");

form.addEventListener('submit', async function (e) {
    e.preventDefault();
    console.log("submitted");

    const adult = document.querySelector("#adult").value;
    const children = document.querySelector("#children").value;
    const cin = document.querySelector("#cin").value; 
    const cout = document.querySelector("#cout").value; 

    const radioButtons = document.querySelectorAll('.class-selection input[type="radio"]');
    let selectedValue = '';
    radioButtons.forEach(button => {
        if (button.checked) {
            selectedValue = button.value;
        }
    });

    let value1 = from.value;
    let value2 = to.value;


    if (!value1 || !value2 || !cin || !cout || !adult) {
        console.error("Please fill in all required fields.");
        return;
    }
    
    const autoCompleteUrlFrom = `https://booking-com18.p.rapidapi.com/flights/auto-complete?query=${value1}`;
    const autoCompleteUrlTo = `https://booking-com18.p.rapidapi.com/flights/auto-complete?query=${value2}`;
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': 'a86a8de6c3mshbba0d6d0b710547p13f84djsnebbf748f58cd',
            'X-RapidAPI-Host': 'booking-com18.p.rapidapi.com'
        }
    };

    try {
        const responseFrom = await fetch(autoCompleteUrlFrom, options);
        const resultFrom = await responseFrom.json();
        console.log(resultFrom);
        const fromId = resultFrom.data[0].iataCode; 
        console.log("From ID: ", fromId);
    
        const responseTo = await fetch(autoCompleteUrlTo, options);
        const resultTo = await responseTo.json();
        console.log(resultTo);
        const toId = resultTo.data[0].iataCode; 
        console.log("To ID: ", toId);
    
        const searchUrl = `https://booking-com18.p.rapidapi.com/flights/search-return?fromId=${fromId}&toId=${toId}&departureDate=${cin}&returnDate=${cout}&adults=${adult}&children=${children}&currency_code=INR`;
    
        const searchResponse = await fetch(searchUrl, options);
        const searchResult = await searchResponse.json();
        console.log(searchResult);
    
        const flights = searchResult.data.flights;
    
        flights.forEach(flight => {
            const airport = flight.bounds[0].segments[0].origin.airportName;
            const name = flight.bounds[0].segments[0].marketingCarrier.name;
            const code = flight.bounds[0].segments[0].origin.airportCode;
            
            console.log(airport);
            console.log(name);
            console.log(code);
            const flightDetails = `
                <div class="flight-container">
                    <div class="flight-details">
                        <div class="flight-info">
                            <p><strong>Airport:</strong> ${airport}</p>
                            <p><strong>Airport Code:</strong> ${code}</p>
                            <p><strong>Airline:</strong> ${name}</p>
                        </div>
                        <button class="book-now" data-name="${name}" data-airport="${airport}">Book-now</button>
                    </div>
                </div>
            `;
    
            const newDiv = document.createElement('div');
            newDiv.innerHTML = flightDetails;
            document.body.appendChild(newDiv);
        });
    
        document.querySelectorAll('.book-now').forEach(button => {
            button.addEventListener('click', async function() {
                const flightName = this.getAttribute('data-name');
                const airport = this.getAttribute('data-airport');
                const adults = document.querySelector('#adult').value;
                const children = document.querySelector('#children').value;
                const checkin = document.querySelector('#cin').value;
                const checkout = document.querySelector('#cout').value;
    
                const bookingData = {
                    flightName,
                    airport,
                    checkin,
                    checkout,
                    adults,
                    children
                };
    
                try {
                    const response = await fetch('bookflight.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(bookingData)
                    });
                    const result = await response.json();
                    alert(result.message);
                } catch (error) {
                    console.error(error);
                }
            });
        });
    } catch (error) {
        console.log(error);
    } 
   
});





