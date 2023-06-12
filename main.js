function createHeart(){
    const heart = document.createElement('div');
    heart.classList.add('heart');

    //The width size to which the heart falls should be between 100width
    heart.style.left = Math.random() * 100 + 'vw';

    //The animationDuration should be b/w 2-5 secs, some will fall faster than others.
    heart.style.animationDuration = Math.random() * 2 + 3 + 's';

    heart.innerHTML = '💙'; 
    document.body.appendChild(heart);
    
    //Removes the hearts at the top edges after 5 secs so we barely see any there
    setTimeout(() => {
        heart.remove();
    }, 5000);
}
setInterval(createHeart, 300);