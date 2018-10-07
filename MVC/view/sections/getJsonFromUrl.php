<?php
include('MVC/model/modelJsonFromUrl.php');
$urlLesoir ='https://soirmag.lesoir.be/182618/article/2018-10-06/les-personnalites-presentes-aux-obseques-de-charles-aznavour-photos';
$urlLesoir2 = 'https://www.lesoir.be/181967/article/2018-10-03/le-prix-nobel-de-chimie-deux-chercheurs-americains-et-un-britannique';
$urlRTL = 'https://www.rtl.be/info/monde/france/charles-aznavour-inhume-apres-un-dernier-hommage-a-la-cathedrale-armenienne-de-paris-1065849.aspx?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3A+Rtlinfos-ALaUne+%28RTL.be+-+La+une+de+l%27actualité%29';
$urlRTBF = 'https://www.rtbf.be/info/belgique/detail_charles-michel-ecrit-a-jean-claude-juncker-pour-demander-un-peu-de-souplesse-budgetaire?id=10038337';
$urlRTBF2 = 'https://www.rtbf.be/info/belgique/detail_bart-de-wever-j-espere-que-tout-le-monde-votera-avec-son-cerveau-le-14-octobre?id=10038986';

$urlLevif = 'https://www.levif.be/actualite/belgique/pour-bart-de-wever-kris-peeters-s-est-trahi/article-normal-1036641.html';
$urlLalibre = 'http://www.lalibre.be/dernieres-depeches/belga/bart-de-wever-kris-peeters-s-est-trahi-5bb9e1e6cd70a16d8144df5a';
$media = array(
    'rtl' => 'w-content-details-article-body', 
    'lesoir' => array('lead gr-article-teaser', 'gr-article-content', 'gr-media gr-media-image gr-main-media'), 
    'rtbf' => 'rtbf-paragraph', 
    'lecho' => '', 
    'levif' => 'article-body', // Nope levif
    'dh' => '', 
    'lalibre' => 'articleText', 
    'sudinfo' => ''
);

?>
    <form action="#" method='post'>
        URL <input type="text" name="url" id="">
        Classe <input type="text" name="classe" id="">
        Tag <input type="text" name="tag" id="" value="div">
        <input type="submit" name='submit'>
    </form>
    <hr>
<?php
if (isset($_POST['submit'])) {
    $urlContent = file_get_contents($_POST['url']);
    $dom = new \DOMDocument('1.0', 'utf-8'); 
    @$dom->loadHTML($urlContent);
    $className = $_POST['classe'];
    // echo '<pre>';
    print_r(getElementsByClassName($dom, $className, $_POST['tag']));
    // echo '</pre>';
}