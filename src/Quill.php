<?php

namespace Alpha1130\OpenAdminQuill;

use OpenAdmin\Admin\Form\Field;

class Quill extends Field
{
    protected $view = 'open-admin-quill::field';

    protected static $css = [
        '//cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css',
        '/vendor/alpha1130/open-admin-quill/quill.zh-cn.css',
    ];

    protected static $js = [
        '//cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.min.js',
        '//cdn.jsdelivr.net/npm/cos-js-sdk-v5/dist/cos-js-sdk-v5.min.js',
        '/vendor/alpha1130/open-admin-quill/quill.editor.js',
        '/vendor/alpha1130/open-admin-quill/quill.qcs-image.js',
    ];

    public function render()
    {

        $config = config('quill');
        $quill = json_encode($config['quill']);
        $qcs = json_encode(QuillQCSImage::buildTempKeys($config['qcs']));

        $this->script = <<<SCRIPT
            const editor = new QuillEditor('{$this->getId()}', {$quill});
            editor.addHandler('image', () => {
                (new QuillQCSImage(editor, {$qcs})).upload()
            });
SCRIPT;

        return parent::render();
    }
}