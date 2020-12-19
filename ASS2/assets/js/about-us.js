
$('.thumbs li').on('click',function(){
    var e=$(this).index();
    if($(this).hasClass('is-active'))
    return;
    $('.thumbs li').removeClass('is-active');
    $(this).addClass('is-active');
    if(!$('.slick-item').hasClass('is-active'))
        $('.slick-item').addClass('hidden');
    switch (e) {
        case 0:
            $('#0').removeClass('hidden');
            $('#thumbs-select').val('0');
            break;
        case 1:
            $('#1').removeClass('hidden');
            $('#thumbs-select').val('1');
            break;
        case 2:
            $('#2').removeClass('hidden');
            $('#thumbs-select').val('2');
            break;
        case 3:
            $('#3').removeClass('hidden');
            $('#thumbs-select').val('3');
            break;
        default:
            break;
    }
});

$('#thumbs-select').on('change', () => {
    let val = $('#thumbs-select option:selected').val();
    if($('.thumbs li').eq(val).hasClass('is-active'))
    return;
    $('.thumbs li').removeClass('is-active');
    $('.thumbs li').eq(val).addClass('is-active');
    if(!$('.slick-item').hasClass('is-active'))
        $('.slick-item').addClass('hidden');
    switch (val) {
        case '0':
            $('#0').removeClass('hidden');
            break;
        case '1':
            $('#1').removeClass('hidden');
            break;
        case '2':
            $('#2').removeClass('hidden');
            break;
        case '3':
            $('#3').removeClass('hidden');
            break;
        default:
            break;
    }
})

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
