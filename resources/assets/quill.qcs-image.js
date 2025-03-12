class QuillQCSImage {
    constructor(editor, options) {
        this.editor = editor;
        this.options = options;
    }

    // 创建COS对象
    buildCOS() {
        return new COS({
            SecretId: this.options.credentials.tmpSecretId,
            SecretKey: this.options.credentials.tmpSecretKey,
            SecurityToken: this.options.credentials.sessionToken,
            StartTime: this.options.startTime,
            ExpiredTime: this.options.expiredTime,
        });
    }

    buildFileInput() {
        const quill = this.editor.quill;
        const fileInput = document.createElement('input');
        fileInput.setAttribute('type', 'file');
        fileInput.setAttribute('accept', 'image/png, image/jpeg');
        fileInput.classList.add('ql-image');
        fileInput.style.display = 'none';
        fileInput.addEventListener('change', () => {
            const files = fileInput.files;
            const range = quill.getSelection(true);

            if (!files || !files.length) {
                return;
            }

            quill.enable(false);

            this.buildCOS().uploadFile({
                Bucket: this.options.bucket,
                Region: this.options.region,
                Key: this.options.keyPrefix + files[0].name,
                Body: files[0],
                onProgress: (progressData) => {
                    console.log(JSON.stringify(progressData));
                }
            }, (err, data) => {
                if (err) {
                    console.log(err);
                    quill.enable(true);
                } else {
                    quill.enable(true);
                    quill.insertEmbed(range.index, 'image', '//' + data.Location);
                    quill.setSelection(range.index + 1);
                }
                fileInput.value = '';
            })
        })

        return fileInput;
    }

    upload() {
        let fileInput = this.editor.quill.container.querySelector('input.ql-image[type=file]');

        if (fileInput == null) {
            fileInput = this.buildFileInput();
            this.editor.quill.container.appendChild(fileInput);
        }

        fileInput.click();
    }

}