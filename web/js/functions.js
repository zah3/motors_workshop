$( document ).ready(function() {
    var content = $('#content');
    content.css('opacity', 0);
    var blogItemContents = $('.blogItemContent');
    blogItemContents.css('opacity', 0);
    var imgs = $('.img-gallery');
    imgs.css('opacity',0);
    var tableTHItems = $('.th');
    tableTHItems.css('opacity',0);
    var tableTDItems = $('.td');
    tableTDItems.css('opacity',0);
    var contactForm = $('.contact-form');
    contactForm.css('opacity', 0);
    var map = $('.map');
    map.css('opacity', 0);
    var li = $('li');
    var liActive = $('.active');
    var offers = $('.promo');
    offers.css('opacity', 0);
    var forSaleItems = $('.forSaleItem');
    forSaleItems.css('opacity', 0);
    var iterator = 1;
    var forSaleItemsRight = $('.forSaleItemRight');
    forSaleItemsRight.css('opacity', 0);
    var form = $('form');
    form.addClass('contact-form');
	$(window).scroll(function(){
		var wScroll = $(this).scrollTop();
		$('.logo').css({
			'transform' : 'translate(0px,' + wScroll /1.75 +'%)'
		});
	});
    content.each(function(){
        var self = $(this);
        $(this).waypoint(function(direction){
            if(direction == "down") {
                self.addClass('animated fadeInLeft');
            }
        },{offset: '80%' });
    });
    blogItemContents.each(function(){
        var self = $(this);
        $(this).waypoint(function(direction){
            if(direction == "down") {
                self.addClass('animated bounceInRight');
                self.css('opacity',1)
            }
        },{offset: '80%' });
    });
    imgs.each(function(){
        var self = $(this);
        $(this).waypoint(function(direction){
            if(direction == "down") {
                self.addClass('animated rollIn');
                self.css('opacity',1);
                self.delay(2000).removeClass('animated rollIn');
            }
        },{offset: '80%' });
    });
    tableTHItems.each(function(){
        var self = $(this);
       $(this).waypoint(function(direction){
            if(direction =="down"){
                self.addClass('animated tada');
                self.css('opacity', 1);
            }
        },{offset: '80%' });
    });
    tableTDItems.each(function(){
        var self = $(this);
        $(this).waypoint(function(direction){
            if(direction == "down") {
                self.addClass('animated bounceInUp');
                self.css('opacity', 1);
            }
        },{offset: '80%' });
    });
    contactForm.waypoint(function(direction){
        if(direction == 'down'){
            contactForm.addClass('animated rubberBand');
            contactForm.css('opacity', 1);
        }
    },{offset: '60%' });
    map.waypoint(function(direction){
        if(direction == 'down'){
            map.addClass('animated rubberBand');
            map.css('opacity', 1);
        }
    },{offset: '50%' });
    liActive.css({
            "background-color": "black",
            "transition": "all 0.40s",
            "box-shadow": "0px 0px 15px #000000",
            "z-index": "2",
            "-webkit-transition": "all 800ms ease-in-out",
            "-webkit-transform": "scale(1.2)",
            "-ms-transition": "all 800ms ease-in-out",
            "-ms-transform": "scale(1.2)",
            "-moz-transition": "all 800ms ease-in-out",
            "-moz-transform": "scale(1.2)",
            "transition": "all 800ms ease-in-out",
            "transform": "scale(1.2)"
    });
    offers.each(function(){
        var self = $(this);
        self.waypoint(function(direction){
        if(direction == 'down'){
            self.addClass('animated bounceInUp');
            self.css('opacity', 1);
        }
        },{offset: '75%' });
    });
    forSaleItems.each(function(){
        var self = $(this);
        self.waypoint(function(direction){

            //
            // var endRow = self.parent().siblings();
            // var startRow = self.parent();
            // console.log(startRow);
            // console.log(endRow);
            if(self.css('opacity') == 0){
                iterator++;
                if(direction == 'down' &&  iterator % 2 != 0 ){
                    // $('</div>').insertBefore(endRow)
                    self.addClass('animated slideInRight');
                    self.css('opacity', 1);

                }else{
                    // $('<div class="row">').insertBefore(startRow);
                    self.addClass('animated slideInLeft');
                    self.css('opacity', 1);
                }
            }

        },{offset: '75%' });
    });
    // forSaleItemsRight.each(function(){
    //     var self = $(this);
    //     self.waypoint(function(direction){
    //         if(direction == 'down'){
    //             self.addClass('animated slideInRight');
    //             self.css('opacity', 1);
    //         }
    //     },{offset: '75%' });
    // });


});