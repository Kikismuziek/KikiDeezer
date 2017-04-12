$(function () {
    var wrapper1 = document.getElementById("wrapper1");
    var wrapper2 = document.getElementById("wrapper2");
    var wrapper3 = document.getElementById("wrapper3");
    var wrapper4 = document.getElementById("wrapper4");

    if (document.getElementById("1")) {
        var option1 = document.getElementById("1");
        option1.className += " wrapperOptions1";
        wrapper1.append(option1);
    }
    if (document.getElementById("2")) {
        var option2 = document.getElementById("2");
        option2.className += " wrapperOptions1";
        wrapper1.append(option2);
    }
    if (document.getElementById("3")) {
        var option3 = document.getElementById("3");
        option3.className += " wrapperOptions1";
        wrapper1.append(option3);
    }
    if (document.getElementById("4")) {
        var option4 = document.getElementById("4");
        option4.className += " wrapperOptions1";
        wrapper1.append(option4);
    }
    if (document.getElementById("5")) {
        var option5 = document.getElementById("5");
        option5.className += " wrapperOptions2";
        wrapper2.append(option5);
    }
    if (document.getElementById("6")) {
        var option6 = document.getElementById("6");
        option6.className += " wrapperOptions2";
        wrapper2.append(option6);
    }
    if (document.getElementById("7")) {
        var option7 = document.getElementById("7");
        option7.className += " wrapperOptions2";
        wrapper2.append(option7);
    }
    if (document.getElementById("8")) {
        var option8 = document.getElementById("8");
        option8.className += " wrapperOptions2";
        wrapper2.append(option8);
    }
    if (document.getElementById("9")) {
        var option9 = document.getElementById("9");
        option9.className += " wrapperOptions3";
        wrapper3.append(option9);
    }
    if (document.getElementById("10")) {
        var option10 = document.getElementById("10");
        option10.className += " wrapperOptions3";
        wrapper3.append(option10);
    }
    if (document.getElementById("11")) {
        var option11 = document.getElementById("11");
        option11.className += " wrapperOptions3";
        wrapper3.append(option11);
    }
    if (document.getElementById("12")) {
        var option12 = document.getElementById("12");
        option12.className += " wrapperOptions3";
        wrapper3.append(option12);
    }
    if (document.getElementById("13")) {
        var option13 = document.getElementById("13");
        option13.className += " wrapperOptions4";
        wrapper4.append(option13);
    }
    if (document.getElementById("14")) {
        var option14 = document.getElementById("14");
        option14.className += " wrapperOptions4";
        wrapper4.append(option14);
    }
    if (document.getElementById("15")) {
        var option15 = document.getElementById("15");
        option15.className += " wrapperOptions4";
        wrapper4.append(option15);
    }
    if (document.getElementById("16")) {
        var option16 = document.getElementById("16");
        option16.className += " wrapperOptions4";
        wrapper4.append(option16);
    }

    function countdown() {
        document.getElementById('wrapper1').style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        document.getElementById('wrapper1').style.color = '#e7ea83';
        document.getElementById('wrapper1').className += " active";

        var amountElements = 1;
        var counting = true;
        var count = 5;
        var number = 0;
        var timerId = setInterval(function () {
            count--;

            if (count == 0) {
                if (counting == true) {
                    amountElements += 1;
                    var elements = document.getElementsByClassName("wrapper");
                    var names = '';
                    for (var i = 0; i < elements.length; i++) {
                        number++;
                        names = elements[i].id;
                        document.getElementById(names).style.backgroundColor = '#8eb3df';
                        document.getElementById(names).style.color = '#d1232a';
                        document.getElementById(names).className = "wrapper wrapper" +number;
                        document.getElementById("wrapper4").style.backgroundColor = 'transparant';
                        document.getElementById("wrapper4").style.color = '#e7ea83';
                    }
                    document.getElementById('wrapper' + amountElements).style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
                    document.getElementById('wrapper' + amountElements).style.color = '#e7ea83';
                    document.getElementById('wrapper' + amountElements).className += " active";
                    counting = false;
                    counting = true;

                    if (number == elements.length) {
                        number = 0;
                    }

                    if (amountElements == elements.length) {
                        amountElements = 0;
                    }
                }
                count = 5;
            }

        }, 1000);

        document.body.onkeyup = function (e) {
            if (e.keyCode == 32) {
                var active = document.getElementsByClassName("active")[0].id;
                count = 0;

                if (active == "wrapper1") {
                    var option = "1";
                    var wrapper = "wrapperOptions1";
                    document.getElementById(active).className = "wrapper wrapper1";
                } else if (active == "wrapper2") {
                    var option = "5";
                    var wrapper = "wrapperOptions2";
                    document.getElementById(active).className = "wrapper wrapper2";
                } else if (active == "wrapper3") {
                    var option = "9";
                    var wrapper = "wrapperOptions3";
                    document.getElementById(active).className = "wrapper wrapper3";
                } else if (active == "wrapper4") {
                    var option = "13";
                    var wrapper = "wrapperOptions4";
                    document.getElementById(active).className = "wrapper wrapper4";
                }

                document.getElementById("option" +option).style.backgroundColor = '#d1232a';
                document.getElementById("option" +option).style.color = '#e7ea83';
                document.getElementById("option" +option).className += " active";

                var amountElements2 = 1;
                var counting2 = true;
                var count2 = 5;
                var number2 = 0;
                var timerId2 = setInterval(function () {
                    count2--;

                    if (count2 == 0) {
                        if (counting2 == true) {
                            option++;
                            amountElements2 += 1;
                            var elements2 = document.getElementsByClassName(wrapper);
                            var names2 = '';
                            for (var i = 0; i < elements2.length; i++) {
                                number2++;
                                names2 = elements2[i].id;
                                document.getElementById("option" +names2).style.backgroundColor = '#e7ea83';
                                document.getElementById("option" +names2).style.color = '#d1232a';
                                document.getElementById("option" +names2).className = "options optionsSmall";
                            }
                            document.getElementById("option" +option).style.backgroundColor = '#d1232a';
                            document.getElementById("option" +option).style.color = '#e7ea83';
                            document.getElementById("option" +option).className += " active";
                            counting2 = false;
                            counting2 = true;

                            if (amountElements2 == elements2.length) {
                                amountElements2 = 0;
                                option -= 4;
                            }
                        }
                        count2 = 5;
                    }

                    document.body.onkeyup = function (e) {
                        if (e.keyCode == 32) {
                            var active = document.getElementsByClassName("active")[0].id;
                            count2 = 0;

                            document.getElementById(active).click();
                        }
                    }

                }, 1000);
            }
        };
    }

    countdown();

});