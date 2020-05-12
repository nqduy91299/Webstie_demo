//  Navbar hide scroll
var header = document.querySelector(".navbar");
var toTop = document.querySelector(".back-to-top-button");
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        var top = window.scrollY;
        if(top > 700){
            header.classList.add('active'); 
        }else{
            header.classList.remove('active');
        }
        document.getElementById("navbar").style.top = "0";
    }else {
        document.getElementById("navbar").style.top = "-100px";
    }
    prevScrollpos = currentScrollPos;
}

//button back to top
function backToTop(){
    window.addEventListener("scroll", () =>{
        if(window.pageYOffset > 100){
            toTop.classList.remove('active');
        }else{
            toTop.classList.add('active');
        }
    });
}

backToTop();

//Make scroll moother 
$(document).ready(function(){
// Add smooth scrolling to all links
    $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
        // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
        
                // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
            });
        } // End if
    });

    $('.datePicker').datepicker({
        dateFormat: 'dd/mm/yy',
        autoSize: true,
        minDate: 0
    });
    $(".datePicker").datepicker("option", "maxDate", '+1M');
    $(".datePicker").datepicker("option", "showAnim", 'slideDown');


});