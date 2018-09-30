$(document).ready(function(){
    // $('body').on('click','a', function (event) {
    //     alert('fff');
    //     event.isDefaultPrevented();
    //     event.preventDefault();
    // })
    $('#submit').keypress(function (e) {
        var key = e.which;
        if (key == 13)  // the enter key code
        {
            $('#submit').click();
            return false;
        }
    });  
    $("#submit").on('click', function(){
        $('.output').empty();
        $('.content').empty();
        let input = $('#input').val();
        let word = input.replace(/ /g, '%20');

        const firstWiki = 'https://fr.wikipedia.org/w/api.php?action=opensearch&format=json&search=' + word;
        const wikiSearch = 'https://fr.wikipedia.org/w/api.php?action=query&list=search&srsearch=' + word + '&utf8=&format=json';
        const parse = 'https://fr.wikipedia.org/w/api.php?action=parse&page='+word+'&utf8=&format=json';
        // const wikidata = 'https://www.wikidata.org/w/api.php?action=query&list=search&srsearch=' + word + '&utf8=&format=json';

        // $('.output').append("firstWiki : <a href='" + firstWiki + "' target='_blank'>" + firstWiki + "</a><br>");
        // $('.output').append("WIKISEARCH :<a href='" + wikiSearch + "' target='_blank'>" + wikiSearch + "</a><br>");
        // $('.output').append("PARSE HTML :<a href='" + parse + "' target='_blank'>" + parse + "</a><br>");
        // $('.output').append("<br>WIKIDATA :<a href='" + wikidata + "' target='_blank'>" + wikidata + "</a><br>");
        

        getInputWiki(firstWiki);
    })

    function getInputWiki(firstWiki){
        $.ajax({
            method: "GET",
            url: firstWiki,
            dataType: "jsonp"
        })
            .done(function (msg) {
                // $('.content').empty();
                let echo = "";
                for (let i = 0; i < msg[1].length; i++) {
                    let link = msg[3][i];
                    let keyword = msg[1][i];
                    let sentence = msg[2][i];
                    
                    echo +=
                        "<div class='displayResults'><div class='title'><p>" +
                        "<a href='" + link + "' target='_blank'>" + keyword +
                        "</a><br>" +
                        "</p></div>" +
                        " <div class='resume'  style='border: solid gray 2px; width:70%;padding: 10px;'>" +
                        "<p>" + sentence + "</p> </div>  <div class='keywords" + i + " items'></div>   </div>" ;
                    // console.log('keyword', keyword);
                    getWikiSearch(keyword, "keywords" + i, 404);
                }
                $('.content').append(echo);
            });
    }
var increment = 0;
    function getWikiSearch(word, div, j, subcategory= false) {
        // $('.content').empty();
        
        let echo = '';
        $.ajax({
            method: "GET",
            url: 'https://fr.wikipedia.org/w/api.php?action=query&list=search&srsearch=' + word + '&utf8=&format=json',
            dataType: "jsonp"
        })
            .done(function (msg) {
                echo += '<button class="btn btn-warning keywordBtn">Mots clés</button><div class="keyword"style="position: relative; left:10px; width: 80%; padding: 10px;"><br>';
                let wikidataURL ='';
                let title= '';
                for (let i = 0; i < msg['query']['search'].length; i++) {
                    let search = msg['query']['search'][i];
                    let wikipediaURL = "http://fr.wikipedia.org/wiki?curid=" + search['pageid'];
                    let trimTitle = (search['title']).replace(/ /g, '%20');
                    // console.log(trimTitle);
                    wikidataURL = 'https://www.wikidata.org/w/api.php?action=query&list=search&srsearch=' + trimTitle + '&utf8=&format=json';
                    
                    echo += "<button class='popup btn btn-info'><h1>" + search['title'] + " </h1></button>";
                    // echo += "    <p>&#8594; WIKIPEDIA :" + search['snippet'] + ", </p>";
                    // echo += "    <p>&#8594;   :<a href='" + wikidata + "' target='_blank'>WIKIDATA </a></p>";
                    echo += '<div class="subKeywords' + i + increment +'">';
                    if (subcategory) {
                        getWikiCeption(trimTitle, "subKeywords" + i + increment);
                    }
                    
                    echo += '</div>';
                    title += "<div class='tempItems'>" 
                        + " <button class='btn btn-success goSearch'>" + search['title'] +"</button> "
                        + "<a class='repeat' href='" + wikipediaURL + "' target='_blank'><button class='btn btn-danger goUrl'>&#8594;</button>"
                        +"</a></div>";
                    // echo += '<div class="'+div+'">';
                    
                    // echo += '</div>';
                    
                    // console.log('wikidataURL', wikidataURL);
                    // getWikiData(wikidataURL, 'wikidata' + i);
                    
                }
                echo += '</div>';
                let keyword = "." + div;
                if (j !== 404) {
                    $('.absolute').append(title);
                }
                else{
                    $(keyword).append(echo);
                    $('.keyword').hide();
                }
            });
    }

    function getWikiCeption(word, div) {
        $.ajax({
            method: "GET",
            url: "https://fr.wikipedia.org/w/api.php?action=opensearch&format=json&search=" + word,
            dataType: "jsonp"
        })
        .done(function (msg) {
            // $('.content').empty();
            let echo = "";
            increment++;
            
                for (let i = 0; i < msg[1].length; i++) {
                    let link = msg[3][i];
                    let keyword = msg[1][i];
                    let sentence = msg[2][i];
                    let color = increment  +","+ increment + 10 +","+increment + 10;
                    echo += '<div style="position: relative;margin: 5px auto; left:10px; padding: 10px;">';
                    echo +=
                    " <div class='content'  style='border: solid rgb(" + color+") 2px; width:70%;padding-left: " + (increment) +"px'>" +
                        "<p>" + sentence + "</p> </div><div class='keywords" + i + "'></div>";
                    echo += '</div>';
                    console.log('keyword', keyword);
                    
                    // if (increment <= 5) {
                    //     console.log(increment);
                    //     getWikiSearch(keyword, "subsub" + i, i);
                    // }
                    // getWikiSearch(keyword, "keywords" + i);
                }
                let keyword = "." + div;
                $(keyword).append(echo);
            
            });
    }
    $("body").on('click', 'a', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        window.open(link,
            'newwindow',
            'width=1000,height=500, left=600, top=400, location=no, manubar=no, status=no, titlebar=no, toolbar=no');
            return false;
    });
    
    $('body').on('click', '.keywordBtn', function(){
        $(this).next('.keyword').toggle("slow");
    });

        
        $("body").on('click', '.popup',function(){
            if ($('.checkBox').val() == 'oui') {
                $('.absolute').empty();
                $('.absolute').css({'display': 'block'});
                $('.close').css({'display':'block'});
                let val = $(this).text();
                let classe = $(this).attr('class');
                getWikiSearch(val, classe, 0);
            }
        });
    $("body").on('click', '.popup', function () {
        let val = $(this).text();
        // $('#input').text(val);
        $('#input').val(val);
        $('#submit').click();
    })

    $("body").on('click', '.close', function () {
        $('.absolute').css({ 'display': 'none' })
        $('.close').css({ 'display': 'none' })
    })


























    function getWikiData(wikidataURL, div, j) {
        let echo = '';
        $.ajax({
            method: "GET",
            url: wikidataURL,
            // Accept: "application/json; charset=utf-8",
            contentType: 'application/json',
            dataType: "jsonp",
            responseType: 'application/json'

        })
            .done(function (msg) {
                let keyword = "." + div;
                $(keyword).empty();
                echo += '<div class="keyword" style="position: relative; left: 100px; border: solid red 2px; width: 80%; padding: 10px;"><br>';
                echo += "<p><a href='" + wikidataURL + "'>" + wikidataURL + "</a></p>";
                for (let i = 0; i < msg['query']['search'].length; i++) {

                    let search = msg['query']['search'][i];
                    let url = "https://www.wikidata.org/wiki/" + search['title'];
                    // echo += "<p>&#8594; <a class='repeat' href='" + url + "' target='_blank'><span>" + search['snippet'] + "</a></p>";                    
                    // console.log(msg['query']['search']);
                    if (search['snippet'] != '') {
                        echo += "<p>&#8594; <a class='repeat' href='" + url + "' target='_blank'><span>" + search['snippet'] + "</a></p>";
                    }
                }
                echo += '</div><br>';


                $(keyword).append(echo);
            });
    }
})