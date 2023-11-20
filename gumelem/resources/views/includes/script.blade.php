    <script src="{{ url('frontend/libraries/jquery/jquery-3.7.0.min.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{ url('frontend/libraries/retina/retina.min.js') }}"></script>
    <script>
      $(window).scroll(function() {
        var offset = $(window).scrollTop();
        console.log(offset);
        $('.navbar').toggleClass('trans', offset < 50);
      });
    </script>
    <script>
        let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
    // wrap carousel by using first child
    next = items[0]
}
let cloneChild = next.cloneNode(true)
el.appendChild(cloneChild.children[0])
next = next.nextElementSibling
}
})
    </script>

