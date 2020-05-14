(function ($) {
    let fileInput = $(".file-input"),
        filePlaceHolder = $(".file-placeholder"),
        fileNotSelected = 'No File Chosen';

    filePlaceHolder.each(function () {
        $(this).on('click', function () {
            let fileField = $(this).parent().parent().find('.file-input');
            fileField.click()
        });
    });

    fileInput.each(function () {
        let fileSelected = $(this).parent().find('.file-selected'),
            fileError = $(this).siblings('.error');

       $(this).on('change', function () {
           if (this.files[0].size <= 2000000) {
               fileError.html("");
               let filePath = $(this).val(),
                   fileArr = filePath.split("\\"),
                   fileName = fileArr[fileArr.length - 1];

               fileSelected.html(fileName);
           } else {
               fileError.html("File size is greater than 2MB");
               fileSelected.html(fileNotSelected);
           }
       })
    });
})(jQuery);