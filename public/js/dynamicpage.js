$(function() {
    var newHash      = "",
        $mainContent = $("#lessonPlan"),
        $pageWrap    = $("#lessonPlanContainer"),
        baseHeight   = 0,
        $el;
        
    $pageWrap.height($pageWrap.height());
    baseHeight = $pageWrap.height() - $mainContent.height();
    
    $("nav").delegate("a", "click", function() {
	oldHash = document.URL;
	var indexOf = oldHash.indexOf("Lesson");
	if(indexOf == -1) {
	    num = 1;
	}
	else if (indexOf >= 0){
	var num = oldHash.replace(/.*?(\d+)[^\d]*$/,'$1');
	}
	
	
	
	if ($(this).attr("id") == "lessonBackButton"){
	    num--;
	}
	else if ($(this).attr("id") == "lessonForwardButton") {
	    num++;
	}
	
	if (num < 1) {
	    num = 1;
	}
	
	window.location.hash = ("Lesson" + num + ".html");
	
	/*if(window.location.hash == "#Lesson0.html"){
	    window.location.hash = "";
	}*/
	return false;      
        
    });
    
    $(window).bind('hashchange', function(){
    
        newHash = window.location.hash.substring(1); 
        if (newHash) {
            $mainContent
                .find("#guts")
                .fadeOut(200, function() {
                    $mainContent.hide().load(newHash + " #guts", function() {
                        $mainContent.fadeIn(200, function() {
                            $pageWrap.animate({
                                height: baseHeight + $mainContent.height() + "px"
                            });
                        });
                        $("nav a").removeClass("current");
                        $("nav a[href="+newHash+"]").addClass("current");
                    });
                });
        };
        
    });
    
    $(window).trigger('hashchange');

});


function getAndIncrementLastNumber(str) {
    return str.replace(/\d+$/, function(s) {
        return ++s;
    });
}

function getAndDecrementLastNumber(str) {
    return str.replace(/\d+$/, function(s) {
        return --s;
    });
}