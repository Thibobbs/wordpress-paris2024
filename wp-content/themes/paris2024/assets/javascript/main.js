const vid = document.querySelector('.video-intro__player video'),
fade      = document.querySelector('.video-intro__fade-effect'),
btn_play  = document.querySelector('.video-intro__button')

btn_play.addEventListener('click', (e) =>
{
	e.preventDefault()
	vid.style.display = 'block'
	if (vid.paused)
	{
		fade.classList.add('active')
		vid.play()
	}
	else 
	{	
		fade.classList.remove('active')
		vid.pause()
	}
})

