const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const count = document.getElementById("count");
const total = document.getElementById("total");
const movieSelect = document.getElementById("movie");

let ticketPrice = +movieSelect.value;

//Loading values from local storage
function loadSavedValues() {
    const selectedSeatsSaved = JSON.parse(localStorage.getItem('selectedSeats'));

    if(selectedSeatsSaved !== null && selectedSeatsSaved.length > 0){
        seats.forEach((seat, index) => {
            if(selectedSeatsSaved.indexOf(index) > -1){
                seat.classList.add('selected');
            }
        });
    }
    const selectedMovieIndex = localStorage.getItem('selectedMovie');
    const selectedMoviePrice = localStorage.getItem('selectedMoviePrice');

    if(selectedMovieIndex !== null && selectedMovieIndex !== 0){
        movieSelect.selectedIndex = selectedMovieIndex;
        ticketPrice = selectedMoviePrice;
    }
    
}

// Setting Movie data to local storage from Movie select eventListener 
function setMovieData(movieIndex, moviePrice) {
  localStorage.setItem("selectedMovie", movieIndex);
  localStorage.setItem("selectedMoviePrice", moviePrice);
}

// Updating total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll(".row .seat.selected");
  const selectedSeatsCount = selectedSeats.length;

  const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

  localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

  count.innerText = selectedSeatsCount;
  total.innerText = selectedSeatsCount * ticketPrice;
}

//Seat click event
container.addEventListener("click", (e) => {
  if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("occupied")
  ) {
    e.target.classList.toggle("selected");
    updateSelectedCount();
  }
});

//Movie select change event
movieSelect.addEventListener("change", (e) => {
  ticketPrice = +e.target.value;
  setMovieData(e.target.selectedIndex, e.target.value);

  updateSelectedCount();
});


//calling function that loads values from local storage 
loadSavedValues();

//Initial count and total
updateSelectedCount();