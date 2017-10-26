const vid      = document.querySelector('video');
const btn_play = document.querySelector('.video-intro__button');

console.log(vid);

var vid_played = false;

btn_play.addEventListener('click', function (e)
{
	if (!vid_played)
	{
		vid_played = true;
		vid.play();
	}
	else 
	{
		vid_played = false;
		vid.pause();
	}
});

