// AOS

  AOS.init();


// SET INTERVAL

function createInterval(finalNumber, element){
    let counter = 0;

    let interval = setInterval(() => {
        
        if (counter < finalNumber) {
            counter++;
            element.innerHTML = counter;
        } else {
            clearInterval(interval);
        }
    },0.5);
}

let firstSpan = document.querySelector('#firstSpan');
let secondSpan = document.querySelector('#secondSpan');
let thirdSpan = document.querySelector('#thirdSpan');

let title = document.querySelector('#title');

let intersectionInterval=true;

let observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting && intersectionInterval==true){
            createInterval(2000,firstSpan);
            createInterval(98.5,secondSpan);
            createInterval(400,thirdSpan);
            intersectionInterval=false;
        }
    });
});

observer.observe(title);