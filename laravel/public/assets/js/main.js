$(document).ready(function() {

    var config = {
        width: $(window).width(),
        height: $(window).height() + 500,
        params: {enableDebugging: "0"}

    };
    var u = new UnityObject2(config);
    

    var $missingScreen = $("#unityPlayer").find(".missing");
    var $brokenScreen = $("#unityPlayer").find(".broken");
    $missingScreen.hide();
    $brokenScreen.hide();
    
   // $("#canvas").removeClass("dataTable");

    u.observeProgress(function(progress) {
        switch (progress.pluginStatus) {
            case "broken":
                $brokenScreen.find("a").click(function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    u.installPlugin();
                    return false;
                });
                $brokenScreen.show();
                break;
            case "missing":
                $missingScreen.find("a").click(function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    u.installPlugin();
                    return false;
                });
                $missingScreen.show();
                break;
            case "installed":
                $missingScreen.remove();
                break;
            case "first":
                break;
        }
    });
    u.initPlugin($("#unityPlayer")[0], "Temp.unity3d");
    
    //$(".empty-container").css("width",)
});