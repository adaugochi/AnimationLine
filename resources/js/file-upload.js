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

    $('.briefForm').on('submit', function (e) {
        fileInput.each(function () {
            let fileWrapper = $(this).parent(),
                filePlaceholder = fileWrapper.find('.file-placeholder'),
                fileSelected = fileWrapper.find('.file-selected');

            if (fileSelected.text().trim() === fileNotSelected) {
                e.preventDefault();
                filePlaceholder.css('borderColor', '#e3342f');
                fileWrapper.append('<label class="error">This field is required</label>');
            }
        });
    });

    fileInput.each(function () {
        let fileWrapper = $(this).parent(),
            fileSelected = fileWrapper.find('.file-selected'),
            filePlaceholder = fileWrapper.find('.file-placeholder');

       $(this).on('change', function () {
           let fileError = fileWrapper.find('.error'),
               fileSize = this.files[0].size / 1024 / 1024; // in MB

           if (fileSize <= 2) {
               let filePath = $(this).val(),
                   fileArr = filePath.split("\\"),
                   fileName = fileArr[fileArr.length - 1];

               fileError.remove();
               fileSelected.html(fileName);
               filePlaceholder.css('borderColor', '#38c172');
           } else {
               fileError.remove();
               fileWrapper.append('<label class="error">File size is greater than 2MB</label>');
               filePlaceholder.css('borderColor', '#e3342f');
               fileSelected.html(fileNotSelected);
           }
       })
    });
})(jQuery);