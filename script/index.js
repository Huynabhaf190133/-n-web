var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
var slideIndex = 0;
autoslides();

function autoslides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(autoslides, 5000); // Change image every 5 seconds
}
var clock=document.getElementById('time');
setInterval(function(){
  var date=new Date();
  var Weekday=new Array(7);
  Weekday[0]="Chủ nhật";
  Weekday[1]="Thứ 2";
  Weekday[2]="Thứ 3";
  Weekday[3]="Thứ 4";
  Weekday[4]="Thứ 5";
  Weekday[5]="Thứ 6";
  Weekday[6]="Thứ 7";
  var d=Weekday[date.getDay()];
  var m=date.getMonth()+1;
  var dayofmonth=date.getDate(0,m);
  var y=date.getFullYear();
  clock.innerHTML=d+"<br>Ngày"+" "+dayofmonth+" "+"Tháng "+m+" "+"Năm "+y;
},1000)
// window.onscroll=function(){stickyNav()};
//   var x=document.getElementById("nav");
//   var y=x.offsetTop;
//   function stickynav()
//   {
//     if(window.pageYOffset>=y)
//     {
//       x.classList.add("");
//       x.style.width="100%";
//       x.style.opacity="0.9"
//     }
//     else
//     {
//       x.classList.remove("hiddendiv");
//       x.style.width="1000px"
//       x.style.opacity="1"
//     }
//   }
