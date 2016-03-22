jQuery(document).ready(function($) {

    function askGeo(){
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            console.log(position.coords.latitude); 
        }
        getLocation();
    }

    if($("#homepage-flag").length > 0) {
        askGeo();
    }

//take current location
function currentLoc() {
    var x = document.getElementById("demo");
    var y = document.getElementById("demo2");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            navigator.geolocation.getCurrentPosition(showPosition2);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = position.coords.latitude; 
    }

    function showPosition2(position) {
        y.innerHTML = position.coords.longitude;
    }

    getLocation();
}

if(document.URL.indexOf("nearby") >= 0){ 
    currentLoc();
}




function lazyMainHero() {
    var x = $('.main-hero-img').attr('fakeurl');

    $('.main-hero-img').attr('src',x);
}

setTimeout(function(){lazyMainHero();},1000);
/*
===================================================================
MAIN PAGE BACKGROUND
===================================================================
*/

$('.main-hero-img').css('opacity','0').load(function() {
    $(this).animate({
        opacity: 1
    }, 500);
});



function slider() {

    //settings for slider
    var width = 2250;
    var animationSpeed = 40000;
    var pause = 0;
    var currentSlide = 1;
    var ease = 'linear';

    //cache DOM elements
    var $slider = $('#slider');
    var $slideContainer = $('.slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, ease, function() {
                if (++currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
    }
    function pauseSlider() {
        clearInterval(interval);
    }
    $slideContainer
    .on('mouseenter', pauseSlider)
    .on('mouseleave', startSlider);
    startSlider();
}
slider();


function owlHeight() {
  var x = $(window).height();
  $('.main-overlay').height(x);
  $('.slider-wrapper').height(x);
  $('.slide').height(x);
}
owlHeight();


function itemHeight() {
    var y = $('.page-item ').width();
    var z = y*1.074;
    $('.page-item ').height(z);
    $('.page-item-slides-img').height(z);
}

itemHeight();
/*
===================================================================
MAIN FORMS
===================================================================
*/

if($(window).width() < 991) {
    $('.page-menu ul li ').click(function(){
        $(this).css('font-size','29px');
    });
}

$('.main-search-form').children('.chosen-container').width('180px');




//MAIN FORM
$('.search-place-list').children('.cat-item').children('a').click(function(e){
    e.preventDefault();
    addLinkPlaceToInput($(this));
});

$('.search-food-list').children('.cat-item').children('a').click(function(e){
    e.preventDefault();
    addLinkFoodToInput($(this));
});

function addLinkPlaceToInput(link){
    var title = link.text();
    $('.main-search-place').val(title);
}

function addLinkFoodToInput(link){
    var title = link.text();
    $('.main-search-food').val(title);
}

//CHECK INPUT PLACE IF VALUE EQUELS TO SLUG 
function checkInputPlace() {

    var placeVal = $('.main-search-place').val();
    var item = $('.search-place-list').children('.cat-item').children('a');
    for (var i = 0; i < item.length; i++) {
        var items = item[i];

        var slug = $(items).text();

        if ( placeVal == slug) {

            var catClass = $(items).parent().attr('class');
            var catSlug = catClass.replace("cat-item ", "");

           
            break;
        }
    }
    if(catSlug){
        return catSlug;
    } else {
        return '';
    }
}



//CHECK INPUT FOOD IF VALUE EQUELS TO SLUG 
function checkInputFood() {

    var foodVal = $('.main-search-food').val();
    var item = $('.search-food-list').children('.cat-item').children('a');
    for (var i = 0; i < item.length; i++) {
        var items = item[i];

        var slug = $(items).text();

        if ( foodVal == slug) {

            var catClass = $(items).parent().attr('class');
            var catSlug = catClass.replace("cat-item ", "");           
            break;
        }
    }
    if(catSlug){
        return catSlug;
    } else {
        return '';
    }
}




//If input checking has a value put it into href of search btn
function linkBtn() {
    var place = checkInputPlace();
    var food = checkInputFood();

    if ( place == undefined && food == undefined ) {
        var link = '';
    } else if ( place !== undefined && food == undefined ) {
        var link = 'index.php?category_name=' + place;
    } else if ( place !== undefined && food !== undefined ) {
        var link = 'index.php?category_name=' + place + '+' + food;
    } else if ( place == undefined && food !== undefined ) {
        var link = 'index.php?category_name=' + food;
    }

    if ( $('.search-checkbox').is(':checked') ) {
        if( link == '' ) {
            var lastLink = 'index.php?category_name=kosher';
        } else {
            var lastLink = link + '+' + 18;
        }
        
    } else {
        var lastLink = link;
    }
    $('.main-button-link').attr('href',lastLink);

    setTimeout(function(){ linkBtn(); },500);
}

linkBtn();

//filter 
$('.main-search-place').keyup(function() {

    var value = $('.main-search-place').val();
    value = value.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });
    $('.search-place-list').children('.cat-item').children('a').each(function() {
        if ($(this).text().search(value) > -1) {
            $(this).show().addClass('active-link');
        }
        else {
            $(this).hide().removeClass('active-link');
        }
    });
});


function searchQuery(){
    var place = checkInputPlace();
    var food = checkInputFood();
    var kosher = ($('.search-checkbox').is(':checked')) ? 18 : '';
    var query;
    if(place != '' && food != '' && kosher != '') {
        query = place+','+food+','+kosher;
    } else if (place != '' && food == '' && kosher == ''){
        query = place;
    } else if (place == '' && food != '' && kosher == ''){
        query = food;
    } else if (place == '' && food == '' && kosher != ''){
        query = kosher;
    } else if (place != '' && food != '' && kosher == ''){
        query =  place+','+food;
    } else if (place == '' && food != '' && kosher != ''){
        query =  kosher+','+food;
    } else {
        query = '';
    }
    return query;
}


$('.main-button-link').click(function( event ) {

    var query = searchQuery();
    event.preventDefault();

    var regex = /\d/g;
    if(regex.test(query)){

        var data = 'id='+query;
        $.ajax({
            data: data,
            type: "POST",
            url: "wp-content/themes/eaters_fast/catquery.php",
            success: function(result){
                alert(result);
                window.location.href = 'http://localhost/eatersTest/?page_id=1325';
            }
        });

    } else {
        alert('אתה חייב לבחור משהו...');
    }
    
});





function load_posts(){
    var ppp = 6; // Post per page
    var cat = $('#more_posts').data('category');
    var pageNumber = 1;
    pageNumber++;
    var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    alert(str);
    $.ajax({
        type: "POST",
        dataType: "html",
        url: my_ajax_object.ajax_url,
        data: str,
        success: function(data){
            var $data = $(data);
            console.log(data);
            if($data.length){
                $("#ajax-posts").append($data);
                setTimeout(function(){

                function markLoadedItemss(){
                    var items = $('.page-item-slides');
                        for(var i=0; i<items.length; i++) {
                        var item = items[i];
                        if( !$(item).hasClass('page-item-attached') ) {
                            $(item).addClass('page-item-newAttached');
                        }
                    }
                }
                markLoadedItemss();

                //DOM BUILDING FOR ITEM SLIDER
                function sliderPicsFills(){
                    var item = $('.page-item-newAttached').find('img');
                    var fakeimg = $('.cat-fake-img').attr('src');

                    for (var i = 0; i < item.length; i++) {
                        var items = item[i];
                        var src = $(items).attr('src');
                        $(items).attr('src','');
                        var href = $(items).parent().parent('ul').prev('a').attr('href');
                        $(items).parent().parent('ul').append( '<li><a href='+href+'><img class="slider-img" src="' + fakeimg + '" data-src="'+src+'"></a></li>' );
                        $(items).parent('a').remove();
                        if($(items) > 10) {
                            var x= parseInt()
                        }
                    }
                }
                sliderPicsFills();

                //ADD FIRST IMG AS LAST FOR LOOP
                function addFirstAsLasts(){
                    var item = $('.page-item-newAttached');
                    var fakeimg = $('.cat-fake-img').attr('data-src');
                    for (var i = 0; i < item.length; i++) {
                        var items = item[i];
                        var src = $(items).children('li').first().children('a').children('img').attr('data-src');
                        var href = $(items).prev('a').attr('href');
                        $(items).append( '<li><a href='+href+'><img class="slider-img" src="' + fakeimg + '" data-src="'+src+'"></a></li>' );
                    }
                }

                addFirstAsLasts();


                sliderImgsSizes();
                totalWidth();


                function attached(){
                    var items = $('.slider-img');
                        for(var i=0; i<items.length; i++) {
                        var item = items[i];
                        if( !$(item).hasClass('attached') ) {
                            $(item).addClass('newAttached');
                        }
                    }
                }
                attached();
                function newAttached(){
                     var items = $('.newAttached');
                        for(var i=0; i<items.length; i++) {
                        var item = items[i];
                        var trueUrl = $(item).attr('data-src');
                        $(item).attr('src',trueUrl);
                        $(item).addClass('attached');
                    }
                }
                newAttached();

                /*var $wrapper = $('.page-items').children('.row');

                $wrapper.find('.page-item').sort(function (a, b) {
                    return +b.dataset.position - +a.dataset.position;
                })
                .appendTo( $wrapper );*/
                function clearClasses(){
                     $('.slider-img').removeClass('newAttached').addClass('attached');
                     $('.page-item-slides').removeClass('page-item-newAttached').addClass('page-item-attached');

                }
                clearClasses();
                },1000);

                
                
                
                //$("#more_posts").attr("disabled",false);
            } else{
                //$("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            alert('error');
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_posts").click(function(){ // When btn is pressed.
    //$("#more_posts").attr("disabled",true); // Disable the button, temp.
    load_posts();

});



//filter 
$('.main-search-food').keyup(function() {
    console.log('dsfsdf');
    var value = $('.main-search-food').val();
    value = value.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });
    $('.search-food-list').children('.cat-item').children('a').each(function() {
        if ($(this).text().search(value) > -1) {
            $(this).show().addClass('active-link');
        }
        else {
            $(this).hide().removeClass('active-link');
        }
    });

});


//hiding results dropdown
$(document).bind('click', function(e) {
  if(!$(e.target).is('.search-place-list') && !$(e.target).is('.main-search-place')) {
    $('.search-place-list').css('display','none');

    trueWidth = 991;
    if( $(window).width() <= trueWidth ){
        $('.main-search-place-wrapper').animate({marginBottom:'20px'},200);
    }
}
});

$( ".main-search-place" ).focus(function() {
    $('.search-place-list').css('display','block');

});

$('.main-search-place').click(function(){

    trueWidth = 991;
    if( $(window).width() <= trueWidth ){
        $('.main-search-place-wrapper').animate({marginBottom:'165px'},200);
    }

});






$(document).bind('click', function(e) {
  if(!$(e.target).is('.search-food-list') && !$(e.target).is('.main-search-food')) {
    $('.search-food-list').css('display','none');
    
    trueWidth = 991;
    if( $(window).width() <= trueWidth ){
        $('.main-search-food-wrapper').animate({marginBottom:'20px'},200);
    }
}
});

$( ".main-search-food" ).focus(function() {
    $('.search-food-list').css('display','block');
});


$('.main-search-food-wrapper').click(function(){

    trueWidth = 991;

    if( $(window).width() <= trueWidth ){
        $('.main-search-food-wrapper').animate({marginBottom:'165px'},200);
    }
});








function detectmobNearby() { 
   if( navigator.userAgent.match(/Android/i)
       || navigator.userAgent.match(/webOS/i)
       || navigator.userAgent.match(/iPhone/i)
       || navigator.userAgent.match(/iPad/i)
       || navigator.userAgent.match(/iPod/i)
       || navigator.userAgent.match(/BlackBerry/i)
       || navigator.userAgent.match(/Windows Phone/i)
       ){
    $('.main-search-place').val('מקומות קרובים אלי');
}
else {

}
}

detectmobNearby();


//DONE BTN
/*
$('someElem').focusout(function(e) {
    alert("Done key Pressed!!!!")
});*/

/*
$('.main-search-place').bind("keypress", function(e){
   // enter key code is 13
   if(e.which === 13){
        trueWidth = 991;
        if( $(window).width() <= trueWidth ){
            $('.search-place-list').css('display','none');
            $('.main-search-place-wrapper').animate({marginTop:'20px'},200);
        }
    } 
});

$('.main-search-food').bind("keypress", function(e){
   // enter key code is 13
   if(e.which === 13){
    trueWidth = 991;
    if( $(window).width() <= trueWidth ){
        $('.search-food-list').css('display','none');
        $('.main-search-food-wrapper').animate({marginTop:'20px'},200);
    }
}
  
});

*/

//NEW CAFE SEARCH----------------------------------------

//function Filter for elements in sidebar
function filter(element) {
  var value = $(element).val();
  value = value.toLowerCase().replace(/\b[a-z]/g, function(letter) {
    return letter.toUpperCase();
});
  $('.main-search-by-name-titles').each(function() {
    if ($(this).text().search(value) > -1) {
        $(this).show().addClass('active-link');

    }
    else {
        $(this).hide().removeClass('active-link');
    }
});
}

//number of active elms
function mainsearchEnter() {
    var actives = $('.active-link').length;
    return actives;
}

//Link to btn
function linkSearch() {
    var numActive = mainsearchEnter();

    if ( numActive == 1 ) {
        var id = $('.active-link').attr('id');
        var x = 'index.php?p=' + id;
        $('.posts-button-links').attr('href',x);
    }
}

//Typing in input
$( ".main-search-by-name-input" ).keyup(function() {
  filter(this);
  linkSearch();
});

//Enter btn
$(document).on("keyup", function (event) {
    if (event.which == 13) {
        var numActive = mainsearchEnter();

        if ( numActive == 1 ) {
            $('#posts-name-submit').click();
        } else {
            console.log('i am enter');
        }
    }
});



$(document).bind('click', function(e) {
  if(!$(e.target).is('.main-search-by-name-input') && !$(e.target).is('.main-search-by-name-titles-wrapper')) {
    $('.main-search-by-name-titles-wrapper').css('display','none');
}
});

$( ".main-search-by-name-input" ).focus(function() {
    $('.main-search-by-name-titles-wrapper').css('display','block');
});
//end of new cafe search







/* 
//JOIN US 
     function joinusHiding() {
        var drop = $('.main-search-form').children('.chosen-container-single');

    }

    function joinusMove() {
        if( $('.main-search-form').children('.chosen-container').hasClass('chosen-with-drop') ) {
        $('.join-us-btn').css('margin-right','120px');
    } else if ( !$('.chosen-container').hasClass('chosen-with-drop') ) {
        $('.join-us-btn').css('margin-right','0');
    }
    }

    $('.main-hero').mouseover(function(){
        joinusMove();
    });

    $('.chosen-results').click(function(){
        joinusMove();
    });

    $('.main-overlay').click(function(){
        joinusMove();
    });

    $(window).mousemove(function(){
        joinusMove();
    });
*/

/*
===================================================================
JOIN US FORM
===================================================================
*/
function popupbackHeight() {
    var x = $(window).height();
    $('.popup-back-wrapper').height(x);     
}

popupbackHeight();

$('.popup-back-wrapper').click(function(){
    $(this).css('display','none');
    $('.join-us-form').slideUp(200);
});

$('.join-us-btn').click(function(){
    $('.join-us-form').slideDown(200);
    $('.popup-back-wrapper').css('display','block');
});

$('.file-952').children('input').attr('id','file-952');
$('.file-953').children('input').attr('id','file-953');
$('.file-954').children('input').attr('id','file-954');
$('.file-955').children('input').attr('id','file-955');
$('.file-956').children('input').attr('id','file-956');

function imgDragDrop(id,uploader) {

   var imageLoader = document.getElementById(id);
   if(imageLoader){
     imageLoader.addEventListener('change', handleImage, false);
 }


 function handleImage(e) {
   var reader = new FileReader();
   reader.onload = function (event) {
       var uploaderClass = '.' + uploader;
       $(uploaderClass).children('img').attr('src',event.target.result);
   }
   reader.readAsDataURL(e.target.files[0]);
}
}

imgDragDrop('file-952','uploader952');
imgDragDrop('file-953','uploader953');
imgDragDrop('file-954','uploader954');
imgDragDrop('file-955','uploader955');
imgDragDrop('file-956','uploader956');

/*-------JOIN US BIG FORM PAYPAL---------*/
/*
$('.join-us-big-form-cf7').find('.wpcf7-submit').click(function(){
    console.log('wp-cf7-check-0');
    setTimeout(function(){
     console.log('wp-cf7-check-1');
     if($('.wpcf7-response-output').hasClass('wpcf7-mail-sent-ok')) {
        console.log('wp-cf7-check-2');
        $('.paypalbutton').trigger('click');
    }
}, 4000);
    setTimeout(function(){
     console.log('wp-cf7-check-1');
     if($('.wpcf7-response-output').hasClass('wpcf7-mail-sent-ok')) {
        console.log('wp-cf7-check-2');
        $('.paypalbutton').trigger('click');
    }
}, 8000);
    setTimeout(function(){
     console.log('wp-cf7-check-1');
     if($('.wpcf7-response-output').hasClass('wpcf7-mail-sent-ok')) {
        console.log('wp-cf7-check-2');
        $('.paypalbutton').trigger('click');
    }
}, 15000);
    
});*/

/*
===================================================================
CAT COLUMN HEIGHTS
===================================================================
*/

function postColumnsHeight() {
    if ($(window).width() > 980 && $(window).height() > 750) {

        var colText = $('.post-col-text').height();
        var colPicture = $('.post-col-picture').height();



        $('.post-col-text').height(colText);
        $('.post-col-picture').height(colText);

        $('.post-close-review-block ').height(colText);
        $('.post-close-map-block ').height(colText);


    } else if ($(window).width() > 980 && $(window).height() < 750) {

        var colText = $('.post-col-text').height();
        var colPicture = $('.post-col-picture').height();



        $('.post-col-text').height(colText);
        $('.post-col-picture').height(colText);

        $('.post-close-review-block ').height(colText);
        $('.post-close-map-block ').height(colText);


    }



    else if ($(window).width() < 980) {

        $('.post-col-text').height('auto');
        $('.post-col-picture').height('auto');
    }
}


function sliderSingleWidth() {
    var x =$('.post-col-picture').width();

    if( $(window).width() < 991 ) {
        $('.item').children('img').height('650px');

    } else {
        var y = $('.post-col-text').height();
        $('.item').children('img').height(y);
    }

    /*

    var item = $('.item').children('img'); 
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var width = $(items).width();
        var height = $(items).height();
        if ( width < height ) {
            var width = $(items).width(x);
        } else {
            var width = $(items).height(y);
        }
    }
    */
}

sliderSingleWidth();


function secondSliderWidth() {
    var wrapper = $('.post-col-picture').width();
    var wrapperH = $('.post-col-picture').height();

    var item = $('.item').children('img'); 
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var width = $(items).width();
        var height = $(items).height();
        if ( width < wrapper ) {
         $(items).width(wrapper);
         $(items).css('height', 'auto');
         $(items).css('min-height', wrapperH);

     }
 }
}


setTimeout(function(){secondSliderWidth();}, 2000);
setTimeout(function(){secondSliderWidth();}, 3000);
setTimeout(function(){secondSliderWidth();}, 4000);
setTimeout(function(){secondSliderWidth();}, 5000);
setTimeout(function(){secondSliderWidth();}, 15000);


/*
===================================================================
===================================================================
CATEGORY PAGE
===================================================================
===================================================================
*/

//Function for filter cats. Save kosher button different.
$('.add-term').click(function(e){
    e.preventDefault();

    //getting slug from the link
    var s = $(this).attr('href');
    var reverse = s.split("").reverse().join("");
    var a = reverse.split('+')[0];
    var slug = a.split("").reverse().join("");

    //if there is active city
    function activeCity(){
        var item = $('.terms-cat0').children('ul').children('li');
        for (var i = 0; i < item.length; i++) {
            var items = item[i];
            if ( $(items).hasClass('current-term') ) {
                return 1;
                break;
            }
        }
    }

    function activeKosher(){
        var kosher = $('.terms-cat1').find('.kosher');
        if ( kosher.parent().hasClass('current-term') ) {
            return 2;
        } 
    }


    if( !$(this).hasClass('kosher') ) {

        if( activeCity() == 1 && activeKosher() != 2) {
            var wloc = window.location;
            var stringLoc = wloc.toString();
            var link = stringLoc.split('+')[0];
            
            var url = link + '+' + slug;
            window.location.href = url;

        } else if( activeCity() != 1 && activeKosher() == 2) {
            var wloc = window.location;
            var stringLoc = wloc.toString();
            var link = stringLoc.split('=')[0];
            
            var url = link + '=kosher+' + slug;
            window.location.href = url;

        } else if ( activeCity() != 1 && activeKosher() != 2) {
            var wloc = window.location;
            var stringLoc = wloc.toString();
            var link = stringLoc.split('=')[0];
            
            var url = link + '=' + slug;
            window.location.href = url;
        } else if ( activeCity() == 1 && activeKosher() == 2) {
            var wloc = window.location;
            var stringLoc = wloc.toString();
            var link = stringLoc.split('+')[0];
            
            var url = link + '+kosher+' + slug;
            window.location.href = url;
        }
    } else {
        var wloc = window.location;
        var stringLoc = wloc.toString();
        var link = stringLoc;
        
        var url = link + '+kosher';
        window.location.href = url;
    }


    //window.location.href = '';
    
});





//SORT BY RATING
var $wrapper = $('.page-items').children('.row');

$wrapper.find('.page-item').sort(function (a, b) {
    return +b.dataset.position - +a.dataset.position;
})
.appendTo( $wrapper );




$('.single-search-small-start-btn').hover(function(){
    var trueurl = $(this).attr('src');
    var fakeurl = $(this).attr('fakesrc');
    $(this).attr('src', fakeurl);
    $(this).attr('fakesrc', trueurl);
},function(){
    var trueurl = $(this).attr('src');
    var fakeurl = $(this).attr('fakesrc');
    $(this).attr('src', fakeurl);
    $(this).attr('fakesrc', trueurl);
});


//CATEGORY ITEM TITLE FONTSIZE
function footerTitle() {

    if ( $(window).width() > 991 ) {
        var x = $('.page-item-wrapper').width();
        var y = x/20;
        $('.page-item-title').css('font-size', y);
        $('.page-hearts-computer').css('font-size', y*1.1);
        $('.page-item-seat-btn').css('font-size', y);
    }
}
footerTitle();



//MOBILE MENU
$('.mobile-menu-sandwich').click(function(){
    if( $(this).hasClass('active') ) {
        $(this).removeClass('active');
        $('.page-menu-tags').slideUp();
    } else {
        $(this).addClass('active');
        $('.page-menu-tags').slideDown();
    }
});

//WAZE CATEGORY link
function wazeCatLink(){
    var items = $('.mobile-waze-cat');
    for(var i = 0; i<items.length; i++){
        var item =  items[i];
        var latitude = $(item).attr('data-lat');
        var longitude = $(item).attr('data-long');
        var href = $(item).attr('href');
        var link = href + latitude + ',' + longitude + '&navigate=yes';
        $(item).attr('href',link);
        console.log(link);
    }
}

wazeCatLink();

/*
===================================================================
PAGE ITEM SLIDER
===================================================================
*/

$(window).load(function () {
    // Page is fully loaded .. time to fade out your div with a timer ..
    $('.page-load-overlay').fadeOut(1300);

});

function changeUrlsPics(){
    var items = $('.slider-img');
    for(var i=0; i<items.length; i++) {
        var item = items[i];
        var trueUrl = $(item).attr('data-src');
        $(item).attr('src',trueUrl);
        $(item).addClass('attached');
    }
}

function markLoadedItems(){
    var items = $('.page-item-slides');
    for(var i=0; i<items.length; i++) {
        var item = items[i];
        $(item).addClass('page-item-attached');
    }
}

$(window).bind("load", function() {
    changeUrlsPics();
    markLoadedItems();
});

//DOM BUILDING FOR ITEM SLIDER
function sliderPicsFill(){
    var item = $('.page-item-slides').find('img');
    var fakeimg = $('.cat-fake-img').attr('src');

    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var src = $(items).attr('src');
        $(items).attr('src','');
        var href = $(items).parent().parent('ul').prev('a').attr('href');
        $(items).parent().parent('ul').append( '<li><a href='+href+'><img class="slider-img" src="' + fakeimg + '" data-src="'+src+'"></a></li>' );
        $(items).parent('a').remove();
        if($(items) > 10) {
            var x= parseInt()
        }
    }
}
sliderPicsFill();

//ADD FIRST IMG AS LAST FOR LOOP
function addFirstAsLast(){
    var item = $('.page-item-slides');
    var fakeimg = $('.cat-fake-img').attr('data-src');
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var src = $(items).children('li').first().children('a').children('img').attr('data-src');
        var href = $(items).prev('a').attr('href');
        $(items).append( '<li><a href='+href+'><img class="slider-img" src="' + fakeimg + '" data-src="'+src+'"></a></li>' );
    }
}

addFirstAsLast();


// SIZE OF SLIDER IMAGES  EQUALES TO CAT-ITEM
function sliderImgsSizes(){
    var x = $('.page-item-wrapper').width();
    var y = $('.page-item-wrapper').height();
    console.log('x=' + x + ' y='+y)
    var item = $('.slider-img');
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        $(items).width(x);
        $(items).height(y);
        $(items).parent('a').parent('li').css('float','left');
    }
}
sliderImgsSizes();

//SIZE OF UL (IMAGE SLIDER CONTAINER)
function totalWidth() {

    var item = $('.page-item-slides');
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var num = $(items).children('li').length;  
        var x = $(items).find('img').width();
        var z = x*(num+1);
        console.log('z= '+z);
        $(items).width(z);
    }
}
totalWidth();

//ITEM SLIDER FUNCTION
function catItemSlider(elem){
     //settings for slider

     var width = $(elem).width();
     var width2 = 0;
     var animationSpeed = 800;
     var animationSpeed2 = 700;
     var animationSpeed3 = 500;
     var pause = 3000;
     var currentSlide = 1;

     var slider = $(elem).find('.page-item-slider');
     var slideContainer = $(elem).find('.page-item-slides');
     var slides = $(elem).find('.slider-img');

     function goS(){
        slideContainer.animate({'margin-left': '-='+width2}, animationSpeed3, function() {
            slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                slideContainer.animate({'margin-left': '-='+width2}, animationSpeed2, function() {

                 if (++currentSlide === slides.length) {
                    currentSlide = 1;
                    slideContainer.css('margin-left', 0);
                } else {
                    goS();
                }
            })
            })
        });
    }

    goS();
}

//HOVER ON ITEM CALLS SLIDER
/*$('.page-item-wrapper').hover(function(){
    catItemSlider(this);
}, function(){
 $(this).find('.page-item-slides').stop().animate('margin-left', 0);
 $(this).find('.page-item-slides').stop().css('margin-left', 0);
});*/

$(document).on({
    mouseenter: function () {
        catItemSlider(this);
    },
    mouseleave: function () {
         $(this).find('.page-item-slides').stop().animate('margin-left', 0);
        $(this).find('.page-item-slides').stop().css('margin-left', 0);
    }
}, '.page-item-wrapper');










$('.page-item-wrapper').hover(function(){
    if( $(window).width() > 991 ) {
        $(this).children().children().children('.page-item-seat-wrapper').slideDown();
        $(this).children().children().children('.page-hearts-computer').slideUp();
    } else if ( $(window).width() < 991 ) {
        $(this).children('.page-mobile-prevent').slideDown();

        $(this).children().children('.page-item-footer-mobile-first ').slideUp();
        $(this).children().children('.page-item-footer-mobile-second ').slideDown();        
    }

}, function(){
    if( $(window).width() > 991 ) {
        $(this).children().children().children('.page-item-seat-wrapper').slideUp();
        $(this).children().children().children('.page-hearts-computer').slideDown();
    } else if ( $(window).width() < 991 ) {
        $(this).children('.page-mobile-prevent').slideUp();

        $(this).children().children('.page-item-footer-mobile-first ').slideDown();
        $(this).children().children('.page-item-footer-mobile-second ').slideUp();
        
    }
})
/*
===================================================================
PAGE MENU
===================================================================
*/


function diaryColor() {
    var items = $('.term-item').children('a');
    for (var i = items.length - 1; i >= 0; i--) {
        var item = items[i];
        var search = $(item).html();
        var searchN = search.search("חלבי");

        if(searchN != -1) {
            /*this is unique string for ul parent class*/
            $(item).parent().parent().addClass('list-cat-items');
            /*end of unique string for ul parent class*/
            $(item).parent().attr('data-position','7');

            if( $(window).width() > 991 ) {
                $(item).css('background-color','#1A92B5');
            } else if ( $(window).width() < 991 ) {

                if( $(item).parent('li').hasClass('current-term') ) {
                    $(item).css('color','#fff');
                    $(item).css('background-color','#1A92B5');
                } else {
                    $(item).css('color','#1A92B5');
                    $(item).css('background-color','#fff');
                }
            }


        }
    };
}
diaryColor();


function categoryStyles(color,word,number,classes) {
    var items = $('.term-item').children('a');
    for (var i = items.length - 1; i >= 0; i--) {
        var item = items[i];
        var search = $(item).html();
        var searchN = search.search(word);

        if(searchN != -1) {
            $(item).parent().attr('data-position',number);
            $(item).addClass(classes);

            if( $(window).width() > 991 ) {
                $(item).css('background-color',color);
            } else if ( $(window).width() < 991 ) {

                if( $(item).parent('li').hasClass('current-term') ) {
                    $(item).css('color','#fff');
                    $(item).css('background-color',color);
                } else {
                    $(item).css('color',color);
                    $(item).css('background-color', '#fff');
                }
            }


        }
    };
}



categoryStyles('#8A4D2C','בארים',1);
categoryStyles('#D11317','המבורגרים',2);
categoryStyles('#E53212',"סנדוויץ' בר",12);
categoryStyles('#FAB400','כשרות',4,'kosher');
categoryStyles('#61B33F','צמחוניות',5);
categoryStyles('#36B6B2','ים תיכוניות',6);
categoryStyles('#97358B','אסייאתיות',8);
categoryStyles('#ED6E83','מסעדות שף',9);
//number 9 - special halavi
categoryStyles('#643319','בתי קפה',10);
categoryStyles('#96222A','בשריות',11);
categoryStyles('#E94F0E','חומוס',3);
categoryStyles('#F07E2D','TOP 8',13);
categoryStyles('#2D8034','טבעוניות',14);
categoryStyles('#216569',"דגים",15);
categoryStyles('#08547E','פיצריות',16);
categoryStyles('#632367','סושיות',17);
categoryStyles('#E7295A','איטלקיות',18);






//SORT SCRIPT FOR LI ITEMS
$(".list-cat-items").children('li').sort(sort_li).appendTo('.list-cat-items');
function sort_li(a, b){
    return ($(b).data('position')) < ($(a).data('position')) ? 1 : -1;    
}


//TAGS WIDTH
function tagsWidth() {
    var ul = $('.terms-post_tag').children('ul').children('li');
    var count = ul.length;
    console.log('count' + count);
    if (count === 1) {
        $('.term-item').width('100%');
    }
}
tagsWidth();






/*
===============================================
SINGLE
===============================================
*/


//Template color icons
function colorIcons(){
    var name = $('.template-name').attr('id');

    var src1 = $('.hidden-post-map').find('img').attr('src')  + name +'-mobile-map-icon.png';
    $('.hidden-post-map').find('img').attr('src', src1);
    
    var src2 = $('.hidden-post-call-us').find('img').attr('src') + name +'-mobile-call-icon.png';
    $('.hidden-post-call-us').find('img').attr('src', src2);

    var src3 = $('.hidden-share-icon').find('img').attr('src') + name +'-share_icon.png';
    $('.hidden-share-icon').find('img').attr('src', src3);

    var src4 = $('.post-reg-info-kosher-first').find('img').attr('src') + name +'-kosher_star_mobile.png';
    $('.post-reg-info-kosher-first').find('img').attr('src', src4);

    var src5 = $('.hidden-post-adress-phone-loc').attr('src') + name +'-loc-icon.png';
    $('.hidden-post-adress-phone-loc').attr('src', src5);
    $('.post-reg-info-address-loc').attr('src', src5);

    var src6 = $('.hidden-post-adress-phone-phone').attr('src') + name +'-phone-icon.png';
    $('.hidden-post-adress-phone-phone').attr('src', src6);
    $('.post-reg-info-address-phone').attr('src', src6);

    var src7 = $('.post-reg-info-kosher-second').find('img').attr('src')  + name +'-kosher_star.png';
    $('.post-reg-info-kosher-second').find('img').attr('src', src7);

    var src8 = $('.post-reg-description-quote-right').find('img').attr('src')  + name +'-quotes-image.png';
    $('.post-reg-description-quote-right').find('img').attr('src', src8);
    $('.post-reg-description-quote-left').find('img').attr('src', src8);
}

colorIcons();






//SHOW CF_7
function showCF(){
    var val = $('.show_cf').text();
    if(val == 'not') {
        $('.post-reg-forms-block').hide();
        $('.post-save-seat-col').hide();
        $('.makeanevent').hide();
    }
}
showCF();



//POST REG COLS HEIGHTS
function postRegHeadHeight(){
    var h1 = $('.post-reg-info-wrapper').height();
    var h2 = $('.post-reg-info-text-col').height();
    var heightTrue = h2+ 15+30;
    $('.post-reg-info-head').height(heightTrue);
    
}

postRegHeadHeight();
setTimeout(function(){postRegHeadHeight();},2000);




function postRegMap() {
    $('.post-reg-map-block').children('iframe').width('100%');
    var mapHeight = $('.post-reg-rslider-wrapper-1300').height();
    $('.post-reg-map-block').children('iframe').height(mapHeight);
}

postRegMap();

//DISPLAYING MAP
function mapDisplay() {
    var h = $('.post-reg-full-info-wrapper').height();

    if ( $('.post-reg-map-block').hasClass('active') ) {
        $('.post-reg-map-block').removeClass('active');
        $('.post-reg-btn-map').text('מפה');
        $('.post-reg-map-block').fadeOut();
        $('.post-reg-btn-map').animate({marginLeft:'45px'},300);

    } else {

        $('.post-reg-map-block').addClass('active');
        $('.post-reg-btn-map').html('&#10006;');
        postRegMap();
        $('.post-reg-map-block').fadeIn();
        $('.post-reg-btn-map').animate({marginLeft:'400px'},300);

    }
}

$('.post-reg-btn-map').click(function(){
    mapDisplay();
});

//function Not Kosher
function notKosher() {
    var search = $('.post-reg-info-kosher').text();
    console.log(search);
    var searchN = search.search("not");

    if(searchN != -1 || search == '' ) {
        $('.post-reg-info-kosher').css('display','none');
    } 
}

notKosher();

//DISPLAYING CAFE-MENU
function cafeMenuPost(){
    var x = $('.post-reg-menu-link').attr('href');
    console.log('my x = ' + x);
    if(!$('.post-reg-menu-link').attr('href')){
        if(!$('.post-reg-menu-link').attr('data-link')){
            console.log('thisone!');
            $('.post-reg-menu-link').parent('div').remove();
        } else {
            var datalink = $('.post-reg-menu-link').attr('data-link');
            $('.post-reg-menu-link').attr('href', datalink);
        }
    }
}
cafeMenuPost();

//TOGGLE CONTACT FORM ON REGULAR SINGLE PAGE
$('.post-reg-forms-block-event-btn').click(function(){

    if( $('.post-reg-forms-block-event-btn').hasClass('active') ) {
        $('.post-reg-forms-block-event-btn').removeClass('active');

        $('.post-reg-forms-event').fadeOut(200);
        $('.post-reg-forms-block-title').fadeOut(200);
        $('.post-reg-forms-block-event-btn').fadeOut(200);
        setTimeout(function(){
            $('.post-reg-forms-seat ').fadeIn(400);
            $('.post-reg-forms-block-title').text("שמור מקום").fadeIn(400);
            $('.post-reg-forms-block-event-btn').text("קבל הצעת מחיר לאירוע").fadeIn(400);
        },400);

    } else {

        $('.post-reg-forms-block-event-btn').addClass('active');

        $('.post-reg-forms-seat').fadeOut(200);
        $('.post-reg-forms-block-title').fadeOut(200);
        $('.post-reg-forms-block-event-btn').fadeOut(200);

        setTimeout(function(){
            $('.post-reg-forms-event ').fadeIn(400);
            $('.post-reg-forms-block-title').text("הזמן אירוע").fadeIn(400);
            $('.post-reg-forms-block-event-btn').text("שמור מקום").fadeIn(400);
        },400);
    }

});




$('.post-facebook-button').click(function(){
 $('._51m-').children('a').trigger('click');
});

$('.post-make-event-btn').click(function(){
    $('.makeanevent').slideDown();
});


//SLIDER PHOTOS FROM CONTENT LOOP
function sliderPhotos() {
    var item = $('.slider-box-hidden-for-content').find('a');
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var link = $(items).attr('href');
        //for regular version
        $( ".rslides" ).append( '<li><img src="' + link + '" alt=""></li>' );
        //for mobile version
        $('.owl-carousel').append( '<div class="item"><img src="' + link + '" width="100%"></div>' );
    }
}
sliderPhotos();


//SLIDER MOBILE SIZE 
function owlPhotosHight() {
    var item = $('#owl-demo').find('img');
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var x = $(items).width();
        console.log(x);
        if( $(items).width() > $(items).height() ) {
            var y = $('#owl-demo').height()
            $(items).height(y);
        } else {
            $(items).width('100%');
        }
    }
}

setTimeout(function(){owlPhotosHight();},1000);
setTimeout(function(){owlPhotosHight();},2000);
setTimeout(function(){owlPhotosHight();},5000);


function respSliderWidth() {
    if($(window).width() > 1300){
        $('.post-reg-rslider-wrapper-1300').width(1300);
    } else {
        $('.post-reg-rslider-wrapper-1300').width('100%');
    }

    var x = $('.post-reg-rslider-wrapper-1300').width();
    var y = x/1.857;
    $('.post-reg-rslider-wrapper-1300').height(y);


    
}

respSliderWidth();

//Slider on regular page
$("#slider4").responsiveSlides({
    maxwidth: 2400,
    speed: 800,
    pager: false,
    nav: true,
    namespace: "callbacks"
});

//Slider on mobile page
$("#owl-demo").owlCarousel({

  autoPlay: 5000,
  slideSpeed : 300,
  paginationSpeed : 400,
  singleItem : true,
  pagination : true


      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

  });



/*---share---*/


$('.share-icon-btn').click(function(){

    if($('.hidden-share').hasClass('active')){
        $('.hidden-share').slideUp();
        $('.hidden-share').removeClass('active');
    } else {
        $('.hidden-share ').slideDown();
        $('.hidden-share ').addClass('active');
    }
});

/*---map---*/
function mapSize() {
    var x = $('.post-col-picture').width();
    $('.post-map-display').children('iframe').width(x).height('100%');
}

mapSize();


$('.post-map-btn').click(function(){

    if($('.post-map-display').hasClass('active')){
        $('.post-map-display').animate({width:'0'});
        $('.post-map-display ').removeClass('active');
        
    } else {
        $('.post-map-display ').animate({width:'100%'});
        $('.post-map-display ').addClass('active');
        $('.post-close-map-block').animate({right:'0'});

    }
});

$('.post-close-map-block').click(function(){

    if($('.post-map-display').hasClass('active')){
        $('.post-map-display').animate({width:'0'});
        $('.post-map-display ').removeClass('active');
        $('.post-close-map-block').animate({right:'-50px'});
    } 
});

/*---reviews---*/

$('.post-review-btn').click(function(){

    if($('.post-reviews-display').hasClass('active')){
        $('.post-reviews-display').animate({width:'0'});
        $('.post-reviews-display ').removeClass('active');
        $('.post-close-review-arrow').animate({left:'-50px'});
    } else {
        if($(window).width() < 991) {
            $('.post-reviews-display ').animate({width:'100%'});
        } else {
            $('.post-reviews-display ').animate({width:'70%'});
        }
        $('.post-reviews-display ').addClass('active');
        $('.post-close-review-arrow').animate({left:'15px'});
    }
});



$('.post-mobile-review-col-title').click(function(){

    if($('.post-reviews-display').hasClass('active')){
        $('.post-reviews-display').animate({width:'0'});
        $('.post-reviews-display ').removeClass('active');
        $('.post-close-review-arrow').animate({left:'-50px'});
    } else {

        if($(window).width() < 991) {
            $('.post-reviews-display ').animate({width:'100%'});
        } else {
            $('.post-reviews-display ').animate({width:'70%'});
        }
        $('.post-reviews-display ').addClass('active');
        $('.post-close-review-arrow').animate({left:'15px'});
    }
});

$('.post-close-review-arrow').click(function(){

    if($('.post-reviews-display').hasClass('active')){
        $('.post-reviews-display').animate({width:'0'});
        $('.post-reviews-display ').removeClass('active');
        $('.post-close-review-arrow').animate({left:'-50px'});
    } 
});



function featuresEmpty() {
    var x = $('.post-features').children('li');
    var item = $('.post-features').children('li');
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        if ($(items).text() === '' ) {
            $(items).css('display','none');
        }
    }
}

featuresEmpty();


/*---mobile forms---*/
function openSaveaseatForm() {
    if($(window).width() < 991) {
        if($('.post-save-seat-landscape').hasClass('active')){
            $('.post-save-seat-landscape').slideUp().removeClass('active');

            var trueurl = $('.post-form-icons-mobile-seat').attr('src');
            var fakeurl = $('.post-form-icons-mobile-seat').attr('fakeurl');
            
            $('.mobile-form-save-title').text('שמור מקום');
            $('.post-form-icons-mobile-seat').attr('src',fakeurl);
            $('.post-form-icons-mobile-seat').attr('fakeurl',trueurl);

        } else {
            $('.post-save-seat-landscape').slideDown().addClass('active');

            var trueurl = $('.post-form-icons-mobile-seat').attr('src');
            var fakeurl = $('.post-form-icons-mobile-seat').attr('fakeurl');
            
            $('.post-form-icons-mobile-seat').attr('src',fakeurl);
            $('.post-form-icons-mobile-seat').attr('fakeurl',trueurl);
            $('.mobile-form-save-title').text('מלא פרטייך:');
            
            $('.post-save-seat-form').find('submit').value('hello');

        }
    }
}

function openEventForm() {
    if($(window).width() < 991) {
        if($('.post-event-form').hasClass('active')){
            $('.post-event-form').slideUp().removeClass('active');

            var trueurl = $('.post-form-icons-mobile-event').attr('src');
            var fakeurl = $('.post-form-icons-mobile-event').attr('fakeurl');
            
            $('.post-form-icons-mobile-event').css('top','-14px');  
            $('.mobile-form-event-title').text('אירועים');
            $('.post-form-icons-mobile-event').attr('src',fakeurl);
            $('.post-form-icons-mobile-event').attr('fakeurl',trueurl);

        } else {
            $('.post-event-form').slideDown().addClass('active');


            var trueurl = $('.post-form-icons-mobile-event').attr('src');
            var fakeurl = $('.post-form-icons-mobile-event').attr('fakeurl');

            $('.post-form-icons-mobile-event').css('top','-3px');            
            $('.post-form-icons-mobile-event').attr('src',fakeurl);
            $('.post-form-icons-mobile-event').attr('fakeurl',trueurl);
            $('.mobile-form-event-title').text('מלא פרטייך:');
        }
    }
}

$('.post-save-seat-title').click(function(){
    openSaveaseatForm();
});

$('.post-event-title').click(function(){
    openEventForm();
});




/**/

var item = $('#terms-category').children('ul').children('li'); 
for (var i = 0; i < item.length; i++) {
    var items = item[i];
    var termClass = ('terms-cat' + [i]);
    $(items).addClass(termClass);
}

$('.terms-cat1').children('a').css('display','none');

/*--HEART--*/

function removePlusSymb() {
   var newValue = $('.count-box').text().replace('+', '');
   $('.count-box').text( newValue );

}
removePlusSymb();

$('.wpulike').click(function(){
    setTimeout(function(){removePlusSymb();}, 1000);
    setTimeout(function(){removePlusSymb();}, 2000);
    setTimeout(function(){removePlusSymb();}, 3000);
    setTimeout(function(){removePlusSymb();}, 4000);
    setTimeout(function(){removePlusSymb();}, 5000);
    setTimeout(function(){removePlusSymb();}, 6000);
    setTimeout(function(){removePlusSymb();}, 7000);
    setTimeout(function(){removePlusSymb();}, 8000);
});


function heartNumber() {
    var item = $('.page-hearts'); 
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var text = $(items).text();
        if ( text === '' ) {
            $(items).children('.page-hearts-zero').text('0');
        }
    }
}

heartNumber();

function heartNumberComp() {
    var item = $('.page-hearts-computer'); 
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        var text = $(items).text();
        if ( text === '' ) {
            $(items).children('.page-hearts-zero').text('0');
        }
    }
}

heartNumberComp();


//form title
function formsFromTitle(){
    var item = $('.formtitle');
    var text = $('.post-col-text-wrapper-first').children('.post-title').text();
    console.log(text);
    for (var i = 0; i < item.length; i++) {
        var items = item[i];
        $(items).val(text);
        var x = $(items).val();
        console.log('x= ' + x);
    }

    /*var item1 = $('.form_from'); 
    for (var i = 0; i < item1.length; i++) {
        var items1 = item1[i];
        $(items1).css('display','none');
         $(items1).next('br').css('display','none');
     }*/
 }

 formsFromTitle();

//WAZE link
function wazeLink(){
    var latitude = $('.mobile-waze').attr('data-lat');
    var longitude = $('.mobile-waze').attr('data-long');
    var href = $('.mobile-waze').attr('href');
    var link = href + latitude + ',' + longitude + '&navigate=yes';
    $('.mobile-waze').attr('href',link);
    console.log(link);
}

wazeLink();

/*
===============================================
LOCATION DETECTING
===============================================
*/


function geoDistance(){
    var xl = $('#demo').text();
    var yl = $('#demo2').text();
    var curLat = Number(xl);
    var curLon = Number(yl);

    console.log('curLat= ' + curLat);
    console.log('curLat= ' + curLon);




    var items = $('.page-item');
    for (var i = 0; i < items.length; i++) {
        var item = items[i];

        var adr_longitude = Number($(item).find('.item-lon').text());
        var adr_latitude = Number($(item).find('.item-lat').text());
        console.log('adr_longitude= ' + adr_longitude);

                       //determine distance
                       function distance(lon1, lat1, lon2, lat2) {
                         var R = 6371; // Radius of the earth in km
                         var dLat = (lat2-lat1).toRad();  // Javascript functions in radians
                         var dLon = (lon2-lon1).toRad(); 
                         var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                         Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
                         Math.sin(dLon/2) * Math.sin(dLon/2); 
                         var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
                         var d = R * c; // Distance in km
                         return d;
                     }

                       // Converts numeric degrees to radians
                       if (typeof(Number.prototype.toRad) === "undefined") {
                           Number.prototype.toRad = function() {
                             return this * Math.PI / 180;
                         }
                     }

                       //


                       var z = distance(curLon, curLat, adr_longitude, adr_latitude);
                       $(item).find('.item-distance').text(z.toFixed(2) + 'km');  
                       $(item).attr('data-distance',z.toFixed(2)); 



                   }/*end of for loop*/

                   var $wrapper = $('.page-items').children('.row');
                   $wrapper.find('.page-item').sort(function (a, b) {
                    return -b.dataset.distance + +a.dataset.distance;
                })
                   .appendTo( $wrapper );
               }


               if(document.URL.indexOf("nearby") >= 0){ 
                setTimeout(geoDistance, 500);
                setTimeout(geoDistance, 700);
                setTimeout(geoDistance, 1000);
                setTimeout(geoDistance, 1500);
                setTimeout(geoDistance, 5000);
            }

            if(document.URL.indexOf("nearby") < 0){ 
                $('.item-distance').css('display','none');
            }


/*
===============================================
WINDOW RESIZE TRIGGER
===============================================
*/
$(window).resize(function(){
    footerTitle();
    owlHeight();
    itemHeight();
    postColumnsHeight();
    popupbackHeight();
    mapSize();
    respSliderWidth();
    postRegHeadHeight();
    sliderImgsSizes();
    totalWidth();
});


itemHeight();

setTimeout(function(){postColumnsHeight();},2000);



});