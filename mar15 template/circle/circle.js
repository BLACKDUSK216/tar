const circleImages = document.querySelectorAll('.circle-image');

function stopAnimation() {
    circleImages.forEach(image => {
        image.style.animationPlayState = 'paused';
    });
}

stopAnimation();

function imageClicked(imageNumber) {
    stopAnimation();
    const clickedImage = document.querySelector(`.circle-image${imageNumber}`);
    const image1 = document.querySelector('.circle-image1');
    const image2 = document.querySelector('.circle-image2');
    const image3 = document.querySelector('.circle-image3');
    const animationDuration = 8;
    
    switch(imageNumber) {
        case 1:
            image1.style.animationDuration = animationDuration + 's';
            image1.style.animationDirection = 'normal'; 
            image1.style.animationPlayState = 'running';

            image2.style.animationPlayState = 'paused';
            image3.style.animationPlayState = 'paused';
            break;
        case 2:
            image2.style.animationDuration = animationDuration + 's';
            image2.style.animationDirection = 'normal'; 
            image2.style.animationPlayState = 'running';

            const computedStyle2 = getComputedStyle(image1);
            const currentTransform2 = computedStyle2.transform;
            const translateX2 = currentTransform2.includes('matrix') ? parseFloat(currentTransform2.split(',')[4]) : 0;
            const translateY2 = currentTransform2.includes('matrix') ? parseFloat(currentTransform2.split(',')[5]) : 0;
            const reverseDirection2 = (translateX2 === 0 && translateY2 === 0) ? 'reverse' : 'normal';

            image1.style.animationDirection = reverseDirection2;
            image1.style.animationPlayState = 'running';
            image3.style.animationPlayState = 'paused';
            break;
        case 3:
            image3.style.animationDuration = animationDuration + 's';
            image3.style.animationDirection = 'normal'; 
            image3.style.animationPlayState = 'running';

            const computedStyle3 = getComputedStyle(image2);
            const currentTransform3 = computedStyle3.transform;
            const translateX3 = currentTransform3.includes('matrix') ? parseFloat(currentTransform3.split(',')[4]) : 0;
            const translateY3 = currentTransform3.includes('matrix') ? parseFloat(currentTransform3.split(',')[5]) : 0;
            const reverseDirection3 = (translateX3 === 0 && translateY3 === 0) ? 'reverse' : 'normal';

            image1.style.animationDirection = reverseDirection3;
            image2.style.animationDirection = reverseDirection3;
            image1.style.animationPlayState = 'running';
            image2.style.animationPlayState = 'running';
            break;
        default:
            break;
    }
    
    setTimeout(() => {
        image1.style.animationPlayState = 'paused';
        image2.style.animationPlayState = 'paused';
        image3.style.animationPlayState = 'paused';
    }, animationDuration * 250); 
}

