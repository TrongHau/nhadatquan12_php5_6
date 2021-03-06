

//HuuThoa Run ckeditor with toobar basic
function runEditorBasic(url, toolbar, width, height) {
    jQuery('.ver_editor_basic').each(function(){            
        CKEDITOR.replace(this.id,
        {
            toolbar: toolbar,
            filebrowserBrowseUrl : url + 'ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : url + 'ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : url + 'ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            width: width,
            height: height,
        });
    });

    jQuery('.my-editor-basic').each(function(){            
        CKEDITOR.replace(this.id,
        {
            toolbar: toolbar,
            filebrowserBrowseUrl : url + 'ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : url + 'ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : url + 'ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            width: width,
            height: height,
        });
    });
}

//HuuThoa Run ckeditor with toobar full
function runEditorFull(url, toolbar, width, height) 
{
    jQuery('.ver_editor_full').each(function(){            
        CKEDITOR.replace(this.id,
        {
            toolbar: toolbar,
            filebrowserBrowseUrl : url + 'ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : url + 'ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : url + 'ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            width: width,
            height: height,
        });
    });
    jQuery('.my-editor-full').each(function(){            
        CKEDITOR.replace(this.id,
        {
            toolbar: toolbar,
            filebrowserBrowseUrl : url + 'ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : url + 'ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : url + 'ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : url + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
            width: width,
            height: height,
        });
    });
}

//HuuThoa run datepicker
//for DOB datepicker 


function runDatePicker(url) {
    // var expired_date = 0;
    // var _url = "getExpiredDate";
    // var params = {};
    // var loaidangtin = $('#Property_loaidangtin').val();
    // params['loaidangtin'] = loaidangtin;
    // var today = new Date();
    // var FSDate = new Date(today);

    // jQuery.ajax({
    //     url: _url,
    //     data: params,
    //     type: 'POST',
    //     dataType: 'JSON',
    //     success: function (data) {
    //         expired_date = parseInt(data);
    //         FSDate.setDate(today.getDate()+expired_date);
    //         var id = jQuery(this).attr('id');
    //         jQuery('#'+id).datepicker(
    //             jQuery.extend(
    //                 {showMonthAfterYear:false}, 
    //                 jQuery.datepicker.regional['vi-VN'], 
    //                 {
    //                     'dateFormat':'dd/mm/yy',
    //                     'regional':'vi_VN',
    //                     'changeMonth':'true',
    //                     'changeYear':'true',
    //                     'yearRange' : '1960',
    //                     'showOn':'button',
    //                     'buttonImage': url + '/admin/images/icon_calendar_r.gif',
    //                     'buttonImageOnly':true,
    //                     'minDate': FSDate
    //                 }
    //             )
    //         );
    //     },
    //     error: function () {
                    
    //     }
    // });
    
    var today = new Date();
    var FSDate = new Date(today);
    FSDate.setDate(today.getDate()+7);
    jQuery('.ver_datepicker_dangtin').each(function(){
        var id = jQuery(this).attr('id');
        
        jQuery('#'+id).datepicker(
            jQuery.extend(
                {showMonthAfterYear:false}, 
                jQuery.datepicker.regional['vi-VN'], 
                {
                    'dateFormat':'dd/mm/yy',
                    'regional':'vi_VN',
                    'changeMonth':'true',
                    'changeYear':'true',
                    'yearRange' : '1960',
                    'showOn':'button',
                    'buttonImage': url + '/admin/images/icon_calendar_r.gif',
                    'buttonImageOnly':true,
                    'minDate': FSDate,
                    // 'disableInput' : true
                    'pickTime': false,
                    // 'minDate' : 'jsDate'
                }
            )
        );
    });

    jQuery('.ver_datepicker_dob').each(function(){
        var id = jQuery(this).attr('id');
        jQuery('#'+id).datepicker(
            jQuery.extend(
                {showMonthAfterYear:false}, 
                jQuery.datepicker.regional['en-GB'], 
                {
                    'dateFormat':'dd/mm/yy',
                    'regional':'en_us',
                    'changeMonth':'true',
                    'changeYear':'true',
                    'yearRange' : '1960',
                    'showOn':'button',
                    'buttonImage': url + '/admin/images/icon_calendar_r.gif',
                    'buttonImageOnly':true,
                }
            )
        );
    });
    jQuery('.ver_datepicker').each(function(){
        var id = jQuery(this).attr('id');
        jQuery('#'+id).datepicker(
            jQuery.extend(
                {showMonthAfterYear:false}, 
                jQuery.datepicker.regional['en-GB'], 
                {
                    'dateFormat':'dd/mm/yy',
                    'regional':'en_us',
                    'changeMonth':'true',
                    'changeYear':'true',
                    'showOn':'button',
                    'buttonImage': url + '/admin/images/icon_calendar_r.gif',
                    'buttonImageOnly':true
                }
            )
        );
    });

    jQuery('.ver_datepicker_dmy').each(function(){
        var id = jQuery(this).attr('id');
        jQuery('#'+id).datepicker(
            jQuery.extend(
                {showMonthAfterYear:false}, 
                jQuery.datepicker.regional['en-GB'], 
                {
                    'dateFormat':'dd-mm-yy',
                    'regional':'en_us',
                    'changeMonth':'true',
                    'changeYear':'true',
                    'showOn':'button',
                    'buttonImage': url + '/admin/images/icon_calendar_r.gif',
                    'buttonImageOnly':true
                }
            )
        );
    });    
}
//HuuThoa run datetimepicker
function runDateTimePicker(url) {    
    jQuery('.ver_datetimepicker').each(function(){
        var id = jQuery(this).attr('id');
        jQuery('#'+id).datetimepicker(
            jQuery.extend(
                {showMonthAfterYear:false}, 
                jQuery.datepicker.regional['en-GB'], 
                {
                    'dateFormat':'dd/mm/yy',
                    'regional':'en_us',
                    'changeMonth':'true',
                    'changeYear':'true',
                    'showOn':'button',
                    'buttonImage': url + '/admin/images/icon_calendar_r.gif',
                    'buttonImageOnly':true
                }
            )
        );
    });
}

//HuuThoa run timepicker
function runTimePicker(url) {
    jQuery('.ver_timepicker').each(function(){
        var id = jQuery(this).attr('id');
        jQuery('#'+id).timepicker(
            jQuery.extend({showMonthAfterYear:false}, 
                jQuery.datepicker.regional['vi-VN'], 
                {
                    'regional':'vi_VN',
                    'minDate':0,
                    'showOn':'button',
                    'buttonImage': url + '/admin/images/icon_calendar_r.gif',
                    'buttonImageOnly':true
                }
            )
        );
    });
}

function validateNumber() {    
    jQuery(".ver_number").keydown(function(e){
        var key = e.which;    

        // backspace, add, tab, left arrow, up arrow, right arrow, down arrow, delete, numpad decimal pt, period, enter
        if (key != 8 && key != 107 &&  key != 187 &&  key != 16 && key != 9 && 
            key != 37 && key != 38 && key != 39 && key != 40 && key != 46 && key != 110 && 
            key != 190 && key != 13 && key != 96 && key != 97 && key != 98 &&  key != 99 
            && key != 100 && key != 101 && key != 102 && key != 103 && key != 104 && key != 105)
        {

            if (e.shiftKey)
            {
                if (key == 61)
                    return key.returnValue;
                else
                    e.preventDefault();
            }
            else
            {
                if (key < 48){
                    e.preventDefault();
                }
                else if (key > 57){
                    e.preventDefault();
                }
            }
        }
    });
}


