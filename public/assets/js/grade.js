$('#id-class').change(function (e) {
    $('#id-student').html('');
    var idClass = $(this).val();
    var CurrentURL = window.location.href;
    var URL = CurrentURL + "get-students/" + idClass;

    $.ajax({
        type: "get",
        url: URL,
        success: function (response) {
            $.each(response, function (index, value) {
                console.log(value);
                var option = `
                <option value="${value.idStudent}">${value.name}</option>
                `;
                $('#id-student').append(option);
            });
        }
    });
})