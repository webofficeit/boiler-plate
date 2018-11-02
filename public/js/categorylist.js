 $('input.styled-checkbox').on('change', function () {
            $('input.styled-checkbox').not(this).prop('checked', false);
            var categorySeo = $(this).val();
            var serachdetails = $(this).attr('data-search');
            if($(this).is(":checked")) {
            $.ajax({
                url: '/category/search',
                type: 'post',
                dataType: 'html',
                data: {"_token": tokenkey, 'searchdata': categorySeo, 'serachdetails': serachdetails},
                success: function (data) {
                    $('.offerlist').html(data);
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('.offerlist').html('');
                    console.log(errorThrown);

                }
            });
        }
        });


