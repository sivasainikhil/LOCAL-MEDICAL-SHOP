// Scroll offers
const offersScroll = document.querySelector('.offers-scroll');

function scrollOffers() {
    offersScroll.scrollLeft += 2; // Adjust scroll speed
}

setInterval(scrollOffers, 50); // Adjust scroll interval as needed
