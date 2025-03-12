class QuillEditor {
    constructor(selector, config) {
        this.input = document.querySelector(`.quill-input-${selector}`);
        
        this.quill = new Quill(`.quill-editor-${selector}`, config);
        this.quill.on('text-change', () => {
            this.input.value = this.quill.root.innerHTML;
        });
    }

    addHandler(name, handler) {
        this.quill.getModule('toolbar').addHandler(name, handler)
    }

}