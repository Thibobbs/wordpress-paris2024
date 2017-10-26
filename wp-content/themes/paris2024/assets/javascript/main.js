const vid      = document.querySelector('.video-intro__player video');
const fade     = document.querySelector('.video-intro__fade-effect');
const btn_play = document.querySelector('.video-intro__button');

console.log(vid);

btn_play.addEventListener('click', function (e)
{
	vid.style.display = 'block';
	if (vid.paused)
	{
		fade.classList.add('active');
		vid.play();
	}
	else 
	{	
		fade.classList.remove('active');
		vid.pause();
	}
});

