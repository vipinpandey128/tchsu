<div class="content">
  <h1 class="section-header">Video Gallery</h1>
  <div class="section-header-underline"></div>
  <div class="video-gallery">
    <div class="gallery-item">
      <img src="https://i.pinimg.com/originals/75/f9/97/75f997ee6acf59dc51bbea05eae36677.jpg" alt="North Cascades National Park" />
      <div class="gallery-item-caption">
        <div>
          <h2>North Cascades</h2>
          <p>The mountains are calling</p>
        </div>
        <a class="vimeo-popup" href="https://www.youtube.com/embed/-_pT-tO9LJc"></a>
      </div>
    </div>

    <div class="gallery-item ">
      <img src="https://cdn.davemorrowphotography.com/wp-content/uploads/2016/08/Mount-Rainier-Star-Photography-Workshops-and-Tours-Header-900x394.jpg" alt="Mt. Rainier" />
      <div class="gallery-item-caption">
        <div>
          <h2>Mt. Rainier</h2>
          <p>14410 feet of adventure</p>
        </div>
        <a class="vimeo-popup" href="https://www.youtube.com/embed/-_pT-tO9LJc"></a>
      </div>
    </div>

    <div class="gallery-item">
      <img src="https://wqtcq1f34a8kduuv3sc0e76o-wpengine.netdna-ssl.com/wp-content/uploads/2018/06/12394537_web1_180620-pdn-goat-web.jpg" alt="Olympic National Park" />
      <div class="gallery-item-caption">
        <div>
          <h2>Olympic National Park</h2>
          <p>Mountains, rain forests, wild coastlines</p>
        </div>
        <a class="vimeo-popup" href="https://youtu.be/-_pT-tO9LJc"></a>
      </div>
    </div>

    <div class="gallery-item">
      <img src="https://upload.wikimedia.org/wikipedia/commons/d/dc/MSH82_st_helens_plume_from_harrys_ridge_05-19-82.jpg" alt="Mount St. Helens" />
      <div class="gallery-item-caption">
        <div>
          <h2>Mount St. Helens</h2>
          <p>The one and only</p>
        </div>
        <a class="vimeo-popup" href="https://vimeo.com/171540296"></a>
      </div>
    </div>

  </div>
</div>

<style>
body {
  font-family: 'Overpass', sans-serif;
}

.section-header {
  text-align: center;
  margin: 60px auto 20px auto;

  font-family: 'Montserrat', sans-serif;
  font-size: 36px;
  font-weight: 400;
  text-transform: uppercase;
  color: #222;
}

.section-header-underline {
  border: 1px solid #222;
  width: 3rem;
  margin: 0 auto;
  margin-bottom: 30px;
}

.video-gallery {
  position: relative;
  margin: 0 auto;
  max-width: 1000px;
  text-align: center;
}

.video-gallery .gallery-item {
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 320px;
  max-width: 580px;
  max-height: 360px;
  width: 48%;
  background: #000;
  cursor: pointer;
}

.video-gallery .gallery-item img {
  position: relative;
  display: block;
  opacity: .45;
  width: 105%;
  height: 300px;
  transition: opacity 0.35s, transform 0.35s;
  transform: translate3d(-23px, 0, 0);
  backface-visibility: hidden;
}

.video-gallery .gallery-item .gallery-item-caption {
  padding: 2em;
  color: #fff;
  text-transform: uppercase;
  font-size: 1.25em;
}

.video-gallery .gallery-item .gallery-item-caption,
.video-gallery .gallery-item .gallery-item-caption > a {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.video-gallery .gallery-item h2 {
  font-weight: 300;
  overflow: hidden;
  padding: 0.5em 0;
}


.video-gallery .gallery-item h2,
.video-gallery .gallery-item p {
  position: relative;
  margin: 0;
  z-index: 10;
}

.video-gallery .gallery-item p {
  letter-spacing: 1px;
  font-size: 68%;

  padding: 1em 0;
  opacity: 0;
  transition: opacity 0.35s, transform 0.35s;
  transform: translate3d(10%, 0, 0);
}

.video-gallery .gallery-item:hover img {
  opacity: .3;
  transform: translate3d(0, 0, 0);

}

.video-gallery .gallery-item .gallery-item-caption {
  text-align: left;
}

.video-gallery .gallery-item h2::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 15%;
  height: 1px;
  background: #fff;
  
  transition: transform 0.3s;
  transform: translate3d(-100%, 0, 0);
}

.video-gallery .gallery-item:hover h2::after {
  transform: translate3d(0, 0, 0);
}

.video-gallery .gallery-item:hover p {
  opacity: 1;
  transform: translate3d(0, 0, 0);
}

@media screen and (max-width: 50em) {
  .video-gallery .gallery-item {
    display: inline-block;
    float: none;
    margin: 10px auto;
    width: 100%;
  }
}
</style>
<script>
    $(document).ready(function() {
  $('.video-gallery').magnificPopup({
  delegate: 'a', 
  type: 'iframe',
  gallery:{
    enabled:true
  }
});
});


</script>