<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script>
    $(document).ready(function () {
            $(".start-date").change(function(e){
                $('.end-date').attr('min', e.target.value);
            });

            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            $('#reservation_form').validate({ // initialize the plugin

        rules: {
            start_date: {
                required: true
            },
            end_date: {
                required: true,
            }
        },
        submitHandler: function(form,e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{url('api/reservation')}}',
                dataType: "JSON",
                data: $('#reservation_form').serialize(),
                success: function(result) {
					toastr.success('Your request has been reserved successfully');
                    $('#no_data').hide();
                    $('#render_list').prepend(result);
                    $('#reservation_form').trigger("reset");
                },
                error : function(error) {
                    let errMsg = JSON.parse(error.responseText);
                    if(error.status === 422){
					toastr.error(errMsg.errors[Object.keys(errMsg.errors)[0]][0]);
                    }else{
					toastr.error(errMsg.error);
                    }
                }
            });
            return false;
        }
    });

    $('#vacancy_form').validate({ // initialize the plugin

rules: {
    vdate: {
        required: true
    },
    vacancy: {
        required: true,
    },
    price: {
        required: true,
    }
},
submitHandler: function(form,e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '{{url('api/date-wise-vacancy')}}',
        dataType: "JSON",
        data: $('#vacancy_form').serialize(),
        success: function(result) {
            toastr.success("Your data has been stored successfully");
            $('#no_data').hide();
            $('#render_list').html(result);
            $('#vacancy_form').trigger("reset");
        },
        error : function(error) {
            let errMsg = JSON.parse(error.responseText);
            if(error.status === 422){
            toastr.error(errMsg.errors[Object.keys(errMsg.errors)[0]][0]);
            }else{
            toastr.error(errMsg.error);
            }
        }
    });
    return false;
}
});
});
</script>
