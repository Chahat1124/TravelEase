const hotel = document.querySelector('#search2');

hotel.addEventListener('submit', async function (e) {
    e.preventDefault();
    console.log("submitted");

    const dest = document.querySelector('#dest').value;
    const autoCompleteUrl = `https://sky-scanner3.p.rapidapi.com/hotels/auto-complete?query=${dest}`;
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': 'cb2b1eff4fmsh1846be904a74f84p16be21jsna26066b43e52',
            'X-RapidAPI-Host': 'sky-scanner3.p.rapidapi.com'
        }
    };

    try {
        const autoCompleteResponse = await fetch(autoCompleteUrl, options);
        const autoCompleteResult = await autoCompleteResponse.json();
        console.log(autoCompleteResult);
        const destinationId = autoCompleteResult.data[0].entityId; 
        console.log("Destination ID: ", destinationId);

        const checkin = document.querySelector("#cin").value;
        const checkout = document.querySelector("#cout").value;

        const searchUrl = `https://sky-scanner3.p.rapidapi.com/hotels/search?entityId=${destinationId}&checkin=${checkin}&checkout=${checkout}`;
        const searchResponse = await fetch(searchUrl, options);
        const searchResult = await searchResponse.json();
        console.log(searchResult);

        const hotelCards = searchResult.data.results.hotelCards;
        const container = document.createElement('div');
        container.classList.add('hotels-container');

        const resultsContainer = document.querySelector('#results');
        resultsContainer.innerHTML = '';

        hotelCards.forEach(hotel => {
            const name = hotel.name;
            const stars = hotel.stars;
            const price = hotel.lowestPrice.price;
            const hotelDetails =
                `<div class="hotel">
                    <h3>${name}</h3>
                    <p>Stars: ${stars}</p>
                    <p>Price: ${price}</p>
                    <button class="book-now" data-name="${name}" data-price="${price}" data-stars="${stars}">BOOK NOW</button>
                </div>`;

            const newDiv = document.createElement('div');
            newDiv.innerHTML = hotelDetails;
            container.appendChild(newDiv);
        });

        resultsContainer.appendChild(container);

        document.querySelectorAll('.book-now').forEach(button => {
            button.addEventListener('click', async function() {
                const hotelName = this.getAttribute('data-name');
                const hotelStars = this.getAttribute('data-stars');
                const adults = document.querySelector('#adult').value;
                const children = document.querySelector('#children').value;
                const checkin = document.querySelector('#cin').value;
                const checkout = document.querySelector('#cout').value;
                const room = document.querySelector('#room').value;

                const bookingData = {
                    hotelName,
                    room,
                    hotelStars,
                    checkin,
                    checkout,
                    adults,
                    children
                };

                try {
                    const response = await fetch('bookhotel.php', {
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
    } catch (error) {
        console.error(error);
    }
});
