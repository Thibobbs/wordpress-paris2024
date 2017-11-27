/** 

    VIDEO CONCEPT & VISION

*/

if (document.querySelector('body').classList.contains('page-id-5')  || document.querySelector('body').classList.contains('page-id-7'))
{
    const vid       = document.querySelector('.video-intro__player video'),
          vid_fade  = document.querySelector('.video-intro__fade-effect'),
          btn_play  = document.querySelector('.video-intro__button'),
          vid_name  = document.querySelector('.video-intro__page-name'),
          vid_title = document.querySelector('.video-intro__title'),
          vid_bg    = document.querySelector('.video-intro__bg'),
          vid_txt   = document.querySelector('.video-intro__paragraph')

    btn_play.addEventListener('click', (e) =>
    {
        e.preventDefault()
        if (vid.paused)
        {
            vid_fade.classList.add('active')
            vid_name.style.opacity = 0
            vid_title.style.opacity = 0
            vid_txt.style.opacity = 0
            btn_play.style.opacity = 0
            vid_bg.style.display = 'none'
            vid.play()
        }
        else 
        {
            vid_fade.classList.remove('active')
            vid.pause()
        }
    })

    vid_fade.addEventListener('click', (e) =>
    {
        e.preventDefault()
        if (vid.paused) 
        {
        }
        else 
        {
            vid_fade.classList.remove('active')
            vid.pause()
            vid_name.style.opacity = 1
            vid_title.style.opacity = 1
            vid_txt.style.opacity = 1
            btn_play.style.opacity = 1
        }
    })
}

/** 

    SLIDER CONCEPT

*/

/** 

    SLIDER HOME

*/

if (document.querySelector('body').classList.contains('home'))
{
  let i = 0
  const slider = document.querySelector('.slider')
  const slides_container = slider.querySelector('.slider__slides')
  let slides = [].slice.call(slider.querySelectorAll('.slider__slide'))
  const controllers = slider.querySelector('.slider__controllers')
  const prev_button = controllers.querySelector('.controllers__prev')
  const next_button = controllers.querySelector('.controllers__next')
  const tiles_container = controllers.querySelector('.controllers__tiles')
  const tiles = [].slice.call(tiles_container.querySelectorAll('.tile'))

  slides_container.style.width = (slides.length * 100) + '%'
  slides_container.style.transform = 'translate(calc(-100%/' + slides.length + '))'

  prev_button.addEventListener('click', (e) =>
  {
    e.preventDefault()
    previous()
  })

  next_button.addEventListener('click', (e) =>
  {
    e.preventDefault()
    next()
  })

  tiles_container.addEventListener('click', (e) =>
  {
    e.preventDefault()
    if (tiles[tiles.indexOf(e.target)] !== undefined && !tiles[tiles.indexOf(e.target)].classList.contains('tile--active')) {
      tiles_container.querySelector('.tile--active').classList.remove('tile--active')
      e.target.className += ' tile--active'

      const place = slides.indexOf(slides_container.querySelector('[index="' + tiles.indexOf(e.target) + '"]'))
      if (place < 1) {
        previous()
      }
      else if (place > 1) {
        next()
      }
    }
  })
  
  function previous() {
    slides_container.style.transform = 'translate(0)'
    setTimeout(() => {
      slides_container.className += ' slider__slides--return'
      slides_container.style.transform = 'translate(calc(-100%/' + slides.length + '))'
      slides[0].before(slides[slides.length-1])
      slides = [].slice.call(slider.querySelectorAll('.slider__slide'))
    }, 300)
    slides_container.classList.remove('slider__slides--return')

    tiles_container.querySelector('.tile--active').classList.remove('tile--active')
    tiles[slides[0].getAttribute('index')].className += ' tile--active'
  }
  
  function next() {
    slides_container.style.transform = 'translate(calc(-200%/' + slides.length + '))'
    setTimeout(() => {
      slides_container.className += ' slider__slides--return'
      slides_container.style.transform = 'translate(calc(-100%/' + slides.length + '))'
      slides[slides.length-1].after(slides[0])
      slides = [].slice.call(slider.querySelectorAll('.slider__slide'))
    }, 300)
    slides_container.classList.remove('slider__slides--return')

    tiles_container.querySelector('.tile--active').classList.remove('tile--active')
    tiles[slides[2].getAttribute('index')].className += ' tile--active'
  }
  
  let autoSlide = setInterval(next, 5000)
  
  slider.addEventListener("mouseover", () => {
    clearInterval(autoSlide)
  })
  
  slider.addEventListener("mouseout", () => {
    autoSlide = setInterval(next, 5000)
  })
}