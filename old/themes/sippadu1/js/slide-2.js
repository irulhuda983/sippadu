  SLIDES = new slideshow("SLIDES");
  SLIDES.timeout = 5000;
  SLIDES.prefetch = 1;
  s = new slide();
  s.src = "./images/image2.jpg";
  SLIDES.add_slide(s);

  s = new slide();
  s.src = "./images/image3.jpg";
  SLIDES.add_slide(s);
  
  s = new slide();
  s.src = "./images/image4.jpg";
  SLIDES.add_slide(s);
  
  s = new slide();
  s.src = "./images/image5.jpg";
  SLIDES.add_slide(s);

  SLIDES.image = document.images.SLIDESIMG;
     
  // SLIDEanimpre = new YAHOO.util.Anim('SLIDESIMG', { opacity: { to: 0.1, from:1 } }, 2, YAHOO.util.Easing.easeOut);

  // SLIDES.pre_update_hook = function() { SLIDEanimpre.animate(); alert("pre"); return; }
  SLIDES.pre_update_hook = function() { YAHOO.util.Dom.setStyle('SLIDESIMG','opacity','0.4'); return; }

  SLIDEanim = new YAHOO.util.Anim('SLIDESIMG', { opacity: { to: 1, from:0.4 } }, 1, YAHOO.util.Easing.easeOut);

  SLIDES.post_update_hook = function() { SLIDEanim.animate(); return; }
  
  SLIDES.update();
  
  YAHOO.util.Event.addListener("body", "onload", SLIDES.play());
 