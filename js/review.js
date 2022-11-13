// local reviews data
const reviews = [
  {
    id: 1,
    name: "susan smith",
    job: "Customer",
    img:
      "https://res.cloudinary.com/diqqf3eq2/image/upload/v1586883334/person-1_rfzshl.jpg",
    text:
      "Great food, excellent service. But sitting in the usual Malaysian aircon breeze can be chilly if you are daft enough to wear a short sleeved shirt. French background music adds to the romance.",
  },
  {
    id: 2,
    name: "anna johnson",
    job: "Customer",
    img:
      "https://res.cloudinary.com/diqqf3eq2/image/upload/v1586883409/person-2_np9x5l.jpg",
    text:
      "Excellent food. Menu is extensive and seasonal to a particularly high standard. Definitely fine dining. It can be expensive but worth it and they do different deals on different nights so it’s worth checking them out before you book. Highly recommended.",
  },
  {
    id: 3,
    name: "peter jones",
    job: "Customer",
    img:
      "https://res.cloudinary.com/diqqf3eq2/image/upload/v1586883417/person-3_ipa0mj.jpg",
    text:
      "This place is great! Atmosphere is chill and cool but the staff is also really friendly. They know what they’re doing and what they’re talking about, and you can tell making the customers happy is their main priority. Food is pretty good, some italian classics and some twists, and for their prices it’s 100% worth it.",
  },
  {
    id: 4,
    name: "bill anderson",
    job: "Customer",
    img:
      "https://res.cloudinary.com/diqqf3eq2/image/upload/v1586883423/person-4_t9nxjt.jpg",
    text:
      "It’s a great experience. The ambiance is very welcoming and charming. Amazing wines, food and service. Staff are extremely knowledgeable and make great recommendations. ",
  },
];

// select items

const img = document.getElementById("person-img");
const author = document.getElementById("author");
const job = document.getElementById("job");
const info = document.getElementById("info");


const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");
const randomBtn = document.querySelector(".random-btn");

// start starting item

let currentItem = 0;


// load initial item

window.addEventListener("DOMContentLoaded",function(){
  showPerson(currentItem);  
})

// show person based on item

function showPerson(person){
  const item = reviews[person];
  img.src = item.img;
  author.textContent = item.name;
  job.textContent = item.job;
  info.textContent = item.text;  
}

// show next person

nextBtn.addEventListener("click",function(){
  currentItem++;
  if(currentItem > reviews.length - 1){
    currentItem = 0;
  }
  showPerson(currentItem);
})
// show prev person
prevBtn.addEventListener("click",function(){
  currentItem--;
  if(currentItem < 0){
    currentItem = reviews.length - 1;
  }
  showPerson(currentItem);
})

// show random person

randomBtn.addEventListener("click",function(){
  currentItem = Math.floor(Math.random() * reviews.length);
  showPerson(currentItem);
})