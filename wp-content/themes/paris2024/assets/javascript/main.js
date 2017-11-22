if (document.querySelector('body').classList.contains('page-id-5')  || document.querySelector('body').classList.contains('page-id-7')) {
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
  let i = 0
  const slider = document.querySelector('.slider')
  const slides_container = slider.querySelector('.slider__slides')
  let slides = slider.querySelectorAll('.slider__slide')
  const controllers = slider.querySelector('.slider__controllers')
  const prev = controllers.querySelector('.controllers__prev')
  const next = controllers.querySelector('.controllers__next')
  const tiles = controllers.querySelector('.controllers__tiles')

  slides_container.style.width = (slides.length * 100) + '%'
  slides_container.style.transform = 'translate(calc(-100%/' + slides.length + '))'

  prev.addEventListener('click', (e) => {
    e.preventDefault()
    slides_container.style.transform = 'translate(0)'
    setTimeout(() => {
      slides_container.className += ' slider__slides--return'
      slides_container.style.transform = 'translate(calc(-100%/' + slides.length + '))'
      slides[0].before(slides[slides.length-1])
      slides = slider.querySelectorAll('.slider__slide')
    }, 300)
    slides_container.classList.remove('slider__slides--return')
  })
  next.addEventListener('click', (e) => {
    e.preventDefault()
    slides_container.style.transform = 'translate(calc(-200%/' + slides.length + '))'
    setTimeout(() => {
      slides_container.className += ' slider__slides--return'
      slides_container.style.transform = 'translate(calc(-100%/' + slides.length + '))'
      slides[slides.length-1].before(slides[0])
      slides = slider.querySelectorAll('.slider__slide')
    }, 300)
    slides_container.classList.remove('slider__slides--return')
  })
}
