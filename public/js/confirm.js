 $(function() {
        $('.hover_bkgr_fricc').hide();
   $('[type="radio"]').on('change', function() {
       $.ajax({
                    url:      '/admin/product/listconfirm',
                    type:     'post',
                    dataType: 'html',
                    data:     {"_token": tokenkey,'datagrid':$(this).attr('data-key'),'dataval':$(this).val()},
                    success: function(data) {
                       $('.msg').html(data);
                        $('.hover_bkgr_fricc').show();
                         
                    },
                    error: function(xhr, textStatus, errorThrown) {
                       
                        $('.msg').html('Error while updated');
                        $('.hover_bkgr_fricc').show();
                    }
                });
   
});
});/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


