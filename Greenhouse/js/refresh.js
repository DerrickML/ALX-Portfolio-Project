jQuery().ready(function() {
    setInterval("getResult()", 500); //set theinterval for the update
});

function getResult() {

    //GREETINGS MESSAGE
    {
        var today = new Date();
        var time = today.toLocaleTimeString();
        var hr = today.getHours();

        document.getElementById("time").innerHTML = time;

        if(hr < 4){
            document.getElementById("time").style.color = "lightblue";
            document.getElementById("greeting").innerHTML = "It's a new day ";
            document.getElementById("main-header1").style.backgroundImage = "url(pics/Wallpapers-hd-space-1080p31.jpg)";
            document.getElementById("main1").style.backgroundImage = "url(pics/neil-rosenstech-713013-unsplash.jpg)";
            document.getElementById("main1").style.backgroundSize = "Cover"
        }
        else if(hr >= 4 && hr <= 11){
            document.getElementById("greeting").innerHTML ="Good-morning ";
            document.getElementById("main-header1").style.backgroundImage = "url(pics/beachSunrise.jpg)";
            document.getElementById("main1").style.backgroundImage = "url(pics/SwampSunRise.jpg)";
        }
        else if(hr >= 12 && hr <= 16){
            document.getElementById("greeting").innerHTML ="Good-afternoon ";
            document.getElementById("main-header1").style.backgroundImage = "url(pics/boris-smokrovic-145963-unsplash.jpg)";
            document.getElementById("main1").style.backgroundImage = "url(pics/boris-smokrovic-203380-unsplash.jpg)";
            document.getElementById("main1").style.backgroundSize = "100%"
        }
        else if(hr >= 17 && hr <= 23){
            document.getElementById("time").style.color = "lightblue";
            document.getElementById("greeting").innerHTML ="Good-evening ";
            document.getElementById("main-header1").style.backgroundImage = "url(pics/jr-korpa-529187-unsplash.jpg)";
            document.getElementById("main1").style.backgroundImage = "url(pics/darryl-brian-222961-unsplash.jpg)";
            
        }
        else{
            document.getElementById("greeting").innerHTML ="Hello ";
        }
    }
    
//Update Max-Temp
    jQuery.post("maxT.PHP", function(data) {
        jQuery("#maxT").html(data);
    });
//Update Min-Temp
jQuery.post("minT.PHP", function(data) {
    jQuery("#minT").html(data);
});
//Update Max-Humidity
    jQuery.post("maxH.php", function(data) {
        jQuery("#maxH").html(data);
    });
//Update Min-Humidity
jQuery.post("minH.php", function(data) {
    jQuery("#minH").html(data);
});
//Update Max-Light Intensity
    jQuery.post("maxL.php", function(data) {
        jQuery("#maxL").html(data);
    });
//Update Min-Light Intensity
jQuery.post("minL.php", function(data) {
    jQuery("#minL").html(data);
});
//Update Max-Moisture    
    jQuery.post("maxM.php", function(data) {
        jQuery("#maxM").html(data);
    });
//Update Min-Moisture    
jQuery.post("minM.php", function(data) {
    jQuery("#minM").html(data);
});

//Update Bulb/Light State
    jQuery.post("Bulb.php", function(data) {
        jQuery("#state0").html(data);
    });
//Update Water-Pump State
    jQuery.post("WaterPump.php", function(data) {
        jQuery("#state2").html(data);
    });
//Update Ventillation-Fan State
    jQuery.post("Fan.php", function(data) {
        jQuery("#state3").html(data);
    });

//Update Greenhouse Light-Intensity reading
    jQuery.post("LightIntensity.php", function(data) {
        jQuery("#readings1").html(data);
//Update Greenhouse Humidity reading
    });
    jQuery.post("Humidity.php", function(data) {
        jQuery("#readings2").html(data);
    });
//Update Greenhouse Temperature reading
    jQuery.post("temperature.php", function(data) {
        jQuery("#readings3").html(data);
        // jQuery("#temp3").html(data);
    });
//Update Greenhouse Moisture reading
    jQuery.post("moisture.php", function(data) {
        jQuery("#readings4").html(data);
    });

//Update user-name
    jQuery.post("getName.php", function(data) {
        jQuery("#names").html(data);
        jQuery("#names1").html(data);
    });

}