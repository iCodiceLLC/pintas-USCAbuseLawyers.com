<?php 
	include 'pintas-data.php';
	class LandingPage
	{
		function __construct()
		{
			# code...
		}
		// Website Title
        function getTitle(){
		    global $title;
		    return $title;
        }
        // Website Meta
        function getMetaKeywords(){
		    global $metaKeywords;
		    return $metaKeywords;
        }
        function getMetaDescription(){
            global $metaDescription;
            return $metaDescription;
        }
        function getMetaSubject(){
            global $metaSubject;
            return $metaSubject;
        }
        function getMetaURL(){
            global $metaUrl;
            return $metaUrl;
        }
        function getMetaReplyTo(){
            global $metaReplyTo;
            return $metaReplyTo;
        }
        // Website Footer
        function getFooterBanner(){
		    global $footerBanner;
		    return $footerBanner;
        }
        function splitFooterLinks($side) {
            global $footerServices;
            return $this->splitArray($footerServices, $side);
        }
        function splitArray($arr, $side) {
            $len = count($arr);
            if($side == "left") {
                return array_slice($arr, 0, $len/2 );
            } else {
                return array_slice($arr, $len/2 );
            }
        }
        // Site Data
        function getEmail(){
		    global $email;
		    return $email;
        }
        function getPhone(){
            global $phone;
            return $phone;
        }
        // Social
        function getSocialLink($social) {

            global $socialLinks;

            if($social == null) {
                echo "No such link";
                return;
            }
            return $socialLinks[$social];
        }
        // Blog
        function getBlogs() {
            global $blogs;
            return $blogs;
        }
        // Testimonial
        function getTestimonials() {
            global $testimonials;
            return $testimonials;
        }

        // CasesHeader
        function getCaseHeader($case) {

            global $casesHeaders;

            if($case == null) {
                echo "No such link";
                return;
            }
            return $casesHeaders[$case];
        }
        // CasesList
        function getCasesList($cases) {

            global $casesLinks;

            if($cases == null) {
                echo "No such link";
                return;
            }
            return $casesLinks[$cases];
        }
        // Website Data
        function getWebsiteData($i) {

            global $pintasDataLink;

            if($i == null) {
                echo "No such link";
                return;
            }
            return $pintasDataLink[$i];
        }
        // TalcumList
        function getTalcumList() {
            global $talcumList;
            return $talcumList;
        }
        // Website Data
        function getTalcumData($i) {

            global $talcumData;

            if($i == null) {
                echo "No such link";
                return;
            }
            return $talcumData[$i];
        }
        // Thank You Image
        function getThankYouImage(){
            global $thankYouImage;
            return $thankYouImage;
        }
	}
?>