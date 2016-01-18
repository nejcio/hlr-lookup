(function(document, window, $) {
  'use strict';

    window.Tools = {
        postAjax : function postAjax (url, data, callback) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(ret){
                    callback(ret);
                },
                contentType: false,
                processData: false,
            });
        }
    }
     $(document).on('submit', ".ajaxcall",function(e){
        e.preventDefault();
        var _url = $(this).attr("action");
        var _data = new FormData($(this)[0]);
        var form = $(this)[0].reset();
        Tools.postAjax(_url,_data, function(ret){
            var div = $('.success');
            div.css({'display':'none'});
            div.empty();
            div.css({'display' : 'block'});
            $(ret.data).each(function(index, el){
                $.each(el, function(key, value){
                    div.append(
                        '<div class="item">'+
                        '<span class="title">' + key +
                        ':</span><span class="value">'+ value +
                        '</span>'+
                        '</div>'
                    );
                });
            });
        });
    });

})(document, window, jQuery);