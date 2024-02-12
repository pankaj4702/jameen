$("document").ready(function () {
    $(".asset-faq-bottom .accordion-item").click(function () {
        $(".asset-faq-bottom .accordion-item").removeClass("active");
        $(this).addClass("active");
    });
});
