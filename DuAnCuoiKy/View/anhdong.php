<div class="gallery">
    <div class="item"></div>
    <div class="item"></div>
    <div class="item"></div>
    <div class="item"></div>
    <div class="item"></div>
</div>
<style>
body {
    margin-top: -100px;
    font-family: 'Times New Roman', Times, serif;
}

.gallery {
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 600px;
}

.item {
    flex: 1;
    height: 100%;
}

.item:nth-child(1) {
    background-image: url("./Content/imagetourdien/30.jpg");

}

.item:nth-child(2) {
    background-image: url("./Content/imagetourdien/64.jpg");

}

.item:nth-child(3) {
    background-image: url("./Content/imagetourdien/44.jpg");

}

.item:nth-child(4) {
    background-image: url("./Content/imagetourdien/75.jpg");

}

.item:nth-child(5) {
    background-image: url("./Content/imagetourdien/4.jpg");

}

.item {
    background-position: center;
    background-size: cover;
    transition: flex 0.8s ease;
}

.item:hover {
    flex: 5;
}
</style>