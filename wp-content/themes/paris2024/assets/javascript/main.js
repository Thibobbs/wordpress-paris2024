if (document.querySelector('body').classList.contains('page-id-5') || document.querySelector('body').classList.contains('page-id-7')) {
  const vid = document.querySelector('.video-intro__player video'),
    fade = document.querySelector('.video-intro__fade-effect'),
    btn_play = document.querySelector('.video-intro__button')

  btn_play.addEventListener('click', (e) => {
    e.preventDefault()
    vid.style.display = 'block'
    if (vid.paused) {
      fade.classList.add('active')
      vid.play()
    } else {
      fade.classList.remove('active')
      vid.pause()
    }
  })
}

if (document.querySelector('body').classList.contains('home')) {
  const slider = document.querySelector('.slider')
  const slides = Array.prototype.slice.call(document.querySelectorAll('.slider__slide__filter'))
  slider.addEventListener('click', (event) => {
    console.log(slides.indexOf(event.target))
    slider.className = 'slider slider--slide' + (slides.indexOf(event.target) + 1)
  })
}