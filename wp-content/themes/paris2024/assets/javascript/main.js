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
  let i = 0
  const slider = document.querySelector('.slider')
  const slides = Array.prototype.slice.call(document.querySelectorAll('.slider__slide__filter'))
  const prev = document.querySelector('.controllers__prev')
  const next = document.querySelector('.controllers__next')
  
  prev.addEventListener('click', (event) => {
    event.preventDefault()
    i = (i-1)%slides.length
    slider.style.transform = 'translate(calc(' + (-100 * i) + '%/' + slides.length + '))'
  })  
  next.addEventListener('click', (event) => {
    event.preventDefault()
    i = (i+1)%slides.length
    console.log(i)
    slider.style.transform = 'translate(calc(' + (-100 * i) + '%/' + slides.length + '))'
  })
}