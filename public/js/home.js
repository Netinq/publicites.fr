setInterval(annimation, 6000);

function annimation()
{
    const images = Array.from(document.getElementsByClassName('background'));
    let index = 0;
    
    images.forEach(img => {
        if (img.classList.contains('background-active'))
        {
            if (index == (images.length - 1)) active(index, 0);
            else active(index, (index + 1));
            return false;
        }
        index++;
    });
}

function active(previous, target)
{
    document.getElementsByClassName('background')[previous]
    .classList.remove('background-active');
    document.getElementsByClassName('background')[target]
    .classList.add('background-active');
}