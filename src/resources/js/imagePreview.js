document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('image');
    const fileNameDisplay = document.getElementById('fileName');
    const imagePreview = document.getElementById('imagePreview');
    const selectedImage = document.getElementById('selectedImage');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            // ファイル名を表示
            fileNameDisplay.textContent = `${file.name}`;
            fileNameDisplay.style.display = 'block';

            // 画像プレビューを表示
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            fileNameDisplay.style.display = 'none';
            imagePreview.style.display = 'none';
        }
    });
});