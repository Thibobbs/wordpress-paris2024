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
        console.log('mdr')
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

