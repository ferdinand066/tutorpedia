$(function () {
    $('#major').on('change', function(){
        let major_id = $(this).val()
        let data = {
            '_token' : $('meta[name="csrf-token"]').attr('content'),
            'major_id' : major_id
        }
        $.post("/course/data", data,
            function (data, textStatus, jqXHR) {
                $('#course').empty()
                data[0].forEach(e => {
                    $('#course').append(`
                        <option value="${ e.id }">${ e.name }</option>
                    `)
                });

                let all = (window.location.pathname == '/course') ? '<option value="">All</option>' : ''

                $('#course').append(`
                    <option value="${ data[1][0].id }">${ data[1][0].name }</option>
                    ${all}
                `)
            }
        );
    })

    
});