/*
* SIDEBAR NAVIGATION FUNCTIONALITY
*/
$(document).ready(function () {
    $(".sidebar-nav .sidebar-items-nav .offcanvas-body .sidebar-itemlist ul li").on('click', function(){
        //Remove active class from all list items
        $(".sidebar-nav .sidebar-items-nav .offcanvas-body .sidebar-itemlist ul li.active").removeClass('active');
        //Add active class to the clicked list item
        $(this).addClass('active');

        //Get the href attribute of the clicked anchor tag
        let href = $(this).find('a').attr('href');
        console.log(href);

        //Navigate to the corresponding page
        window.location.href = href;

        //Prevent the default behavior of the anchor tag
        return false;
    });
});