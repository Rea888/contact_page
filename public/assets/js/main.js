let img = document.querySelector('.img-movable');

img.addEventListener("mousemove", function(e) {
    let rect = this.getBoundingClientRect();
    let width = this.offsetWidth;
    let height = this.offsetHeight;
    let halfWidth = width / 2;
    let halfHeight = height / 2;
    let xAxis, yAxis;

    let mouseX = e.pageX - rect.left;
    let mouseY = e.pageY - rect.top;

    if (mouseX < halfWidth && mouseY < halfHeight) {
        // top left corner
        xAxis = -(halfWidth - mouseX) / 10;
        yAxis = -(halfHeight - mouseY) / 10;
    } else if (mouseX > halfWidth && mouseY < halfHeight) {
        // top right corner
        xAxis = (mouseX - halfWidth) / 10;
        yAxis = -(halfHeight - mouseY) / 10;
    } else if (mouseX < halfWidth && mouseY > halfHeight) {
        // bottom left corner
        xAxis = -(halfWidth - mouseX) / 10;
        yAxis = (mouseY - halfHeight) / 10;
    } else {
        // bottom right corner
        xAxis = (mouseX - halfWidth) / 10;
        yAxis = (mouseY - halfHeight) / 10;
    }

    this.style.transform = `rotate3d(${xAxis}, ${yAxis}, 0, 10deg)`;
});

img.addEventListener('mouseleave', function() {
    this.style.transform = `rotate3d(0, 0, 0, 0deg)`;
});


