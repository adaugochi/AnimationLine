(function ($) {
    let fileInput = $(".file-input"),
        fileSelected = $(".file-selected"),
        invalidTextField = $(".company-logo .invalid-feedback"),
        fileNotSelected = 'No File Chosen';

    fileInput.on('change', function () {
        let filePath = $(this).val(),
            fileArr = filePath.split("\\"),
            fileName = fileArr[fileArr.length - 1];

        fileSelected.html(fileName);
    });
})(jQuery);
