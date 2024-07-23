window.addEventListener("scroll", function(){
    let header = document.querySelector('#header')
    header.classList.toggle('scroll', this.window.scrollY > 0)
})

