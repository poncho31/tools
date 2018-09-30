<style>
.keyword{
    display: none;
}
.absolute{
    z-index: 100;
    position: fixed;
    width: 50%;
    height: 400px;
    background: rgba(253, 126, 20, 0.99);
    right: 0;
    top: 40vh;
    box-shadow: -1px 1px 5px black;
    color: white;
    font-weight: bold;
    display: none;
}

.close{
    display: none;
    position: fixed;
    top:350px;
    right:45%;
    z-index: 101;
    padding: 20px;
    width: 50px;
    height: 50px;
}
.tempItems{
    display: inline-block;
    /* border: solid 2px darkgreen; */
    margin: 1%;
    width: 45%;

}
.tempItems button{
    float: left;
    /* padding-right: 10%;
    margin-right: 10%; */
}
button{
    margin: 1%;
}
.keywordBtn{
    position: relative;
    top: 0;
    left: 0;
}
.displayResults div{
    display: inline-block;
    /* width: 10%; */

}
.title{
    width: 28%;
    font-size: 1.5em;
    /* border: solid red 1px; */
    padding: 10px;
    position: relative;
}
.title a{
    color: #fd7e14;
    font-weight: bold;
    font-variant: small-caps;
}
.displayResults{
    display: block;
    float: left;
    width: 45%;
    margin: 1%;
    box-sizing: border-box;
    position: relative;
    top:0;
}
.content{
    display: block;
}
span{
    font-weight: bold;
}
</style>


<section class="wiki">
    Input : <input type="text" id="input">
    Info popup : <input type="text" class='checkBox' placeholder='oui / non ?' value="oui">
    <button id="submit" class="btn btn-success">Submit</button><br><br>
    <div class="output"></div><br><br>
    <div class="content"></div><br><br>
    <div class="absolute"></div><button class='btn btn-danger close'>&#215;</button>
</section>