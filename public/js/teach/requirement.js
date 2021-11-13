$(function () {
    $('#add-requirement').on('click', function(){
        let text = $('#requirement_insert').val().trim()
        if (text.length > 0){
            $('#spec-container').append(
                `
                <span class="requirement-items my-1 gap-2 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize leading-4">
                    <div>${ text }</div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </span>
                `
            )
            $('#requirement_insert').val('')
        }
    })

    $('body').on('click', '.requirement-items', function(){
        $(this).remove()
    })

    $('#create-class').on('submit', function(e){
        e.preventDefault()
        let requirement = $('#spec-container').children().get()
        requirement.forEach(element => {
            let text = $(element).find('div').text().trim()
            $(this).append(`
                <input type="hidden" name="requirement[]" value="${text}">
            `)
        });
        $(this).unbind('submit').submit()
    })
});