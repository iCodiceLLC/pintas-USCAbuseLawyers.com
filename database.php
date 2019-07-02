<?php
/**
 * Created by IntelliJ IDEA.
 * User: Amaraa
 * Date: 6/3/2019
 * Time: 10:32 AM
 */
?>
<?php
include "db/pintasdb.php";
//include "db/counter.php";
// UTM Params
if(isset($_GET['utm_source'])) {
    $_SESSION['utmSource'] = $_GET['utm_source'];
}
if(isset($_GET['utm_medium'])) {
    $_SESSION['utmMedium'] = $_GET['utm_medium'];
}
if(isset($_GET['utm_campaign'])) {
    $_SESSION['utmCampaign'] = $_GET['utm_campaign'];
}
if(isset($_GET['utm_term'])) {
    $_SESSION['utmTerm'] = $_GET['utm_term'];
}
if(isset($_GET['utm_content'])) {
    $_SESSION['utmContent'] = $_GET['utm_content'];
}

// PHP Database
$page = new LandingPage;
$title = $page->getTitle();
// Meta
$metaKeywords = $page->getMetaKeywords();
$metaDescription = $page->getMetaDescription();
$metaSubject = $page->getMetaSubject();
$metaUrl = $page->getMetaURL();
$metaReplyTo = $page->getMetaReplyTo();
// Footer
$footerBanner = $page->getFooterBanner();
// Footer Links
$leftLinks = $page->splitFooterLinks("left");
$rightLinks = $page->splitFooterLinks("right");
// Site Data
$email = $page->getEmail();
$phone = $page->getPhone();
// Social Connection
$instagram = $page->getSocialLink("instagram");
$facebook = $page->getSocialLink("facebook");
$twitter = $page->getSocialLink("twitter");
// Blogs
$blog = $page->getBlogs();
// Cases
$caseHeader = $page->getCaseHeader("caseHeader");
$caseDescription = $page->getCaseHeader("caseDescription");
$caseTopOne = $page->getCasesList("TopFirst");
$caseTopTwo = $page->getCasesList("TopSecond");
$caseTopThree = $page->getCasesList("TopThird");
$caseTopFour = $page->getCasesList("TopFour");

// $bulletOne = $page-> getbulletPoints("bullet1");
// $bulletTwo = $page-> getbulletPoints("bullet2");
// $bulletThree = $page-> getbulletPoints("bullet3");
// $bulletFour = $page-> getbulletPoints("bullet4");

// Testimonials
$testimonial = $page->getTestimonials();
// FormTitle
$pintasHeader = $page->getWebsiteData("header");
$pintasTitle = $page->getWebsiteData("title");
$pintasSlide = $page->getWebsiteData("slideTitle");
$pintasDescription = $page->getWebsiteData("slideDescription");
// TalcumList
$talcumHeader = $page->getTalcumData("header");
$talcumDescription = $page->getTalcumData("description");
$talcumList = $page->getTalcumList();
// Footer
$thankYouImage = $page->getThankYouImage();
// Keeps associative arrays in place for use later
function shuffle_assoc(&$array) {
    $keys = array_keys($array);

    shuffle($keys);

    foreach($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}
?>