$(function () {
    $('.trigger-dropdown').on('click', function(){
        let current = $(this).parent().parent()
        current.find('.triggered').toggleClass('button animate__animated animate__fadeIn')
        current.find('.triggered').toggleClass('hidden')
    })

    $('.toggle-sidebar').on('click', function(){
        $('#mobile-sidebar, #mobile-title').toggleClass('hidden')
    })

    $('#major-button').hover(function(){
        $('#major-dropdown').toggleClass('hidden')
        $('#major-button').find('span').toggleClass('text-indigo-700')
        $('#major-button').find('.course-list').addClass('hidden')
    })

    $('.major-menu').hover(function(){
        let id = $(this).data('id')
        let parent = $(this).closest('#major-button')
        
        $('#major-button').find('.course-list').addClass('hidden')
        parent.find(`#major-menu-${id}`).removeClass('hidden')
    })

    $('.cancel-btn').on('click', function(){
        window.location.href = '/home'
    })
});