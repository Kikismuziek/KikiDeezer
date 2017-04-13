/**
 * Created by Plaisir on 6-4-2017.
 */
$(function(){
    var back = $(".backBtn");
    var home = $(".homeBtn");

    var wrapper = $(".wrapper");
    var wrapper4 = $(".wrapper4");

    back.appendTo(wrapper4);
    home.appendTo(wrapper4);

    countdown();
});

function countdown() {
    document.getElementById('option1').style.backgroundColor = '#d1232a';
    document.getElementById('option1').style.color = '#e7ea83';
    document.getElementById('option1').className += " active";
    var speak = document.getElementById('option1').textContent;
    responsiveVoice.speak(speak, "Dutch Female");

    var amountElements = 1;
    var counting = true;
    var nospeak = false;
    var count = 5;
    var timerId = setInterval(function () {
        count--;

        if (count == 0) {
            if (counting == true) {
                amountElements += 1;
                var elements = document.getElementsByClassName("options");
                var names = '';
                for (var i = 0; i < elements.length; i++) {
                    names = elements[i].id;
                    document.getElementById(names).style.backgroundColor = '#e7ea83';
                    document.getElementById(names).style.color = '#d1232a';
                    document.getElementById(names).className = "options";
                    document.getElementById("option1").style.backgroundColor = 'white';
                    document.getElementById("option1").style.color = '#d1232a';
                }
                document.getElementById('option' + amountElements).style.backgroundColor = '#d1232a';
                document.getElementById('option' + amountElements).style.color = '#e7ea83';
                document.getElementById('option' + amountElements).className += " active";
                var speak = document.getElementById('option' + amountElements).textContent;
                responsiveVoice.speak(speak, "Dutch Female");
                counting = false;
                counting = true;

                if (amountElements == elements.length) {
                    amountElements = 0;
                }
            }
            count = 5;
        }

        var counting2 = true;
        var count2 = 0;
        var timerId2;

    }, 1000);

    document.body.onkeyup = function (e) {
        if (e.keyCode == 32) {
            var active = document.getElementsByClassName("active")[0].id;
            count = 0;

            document.getElementById(active).click();
        }
    }
}

