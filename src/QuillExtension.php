<?php

namespace Alpha1130\OpenAdminQuill;

use OpenAdmin\Admin\Extension;

class QuillExtension extends Extension
{
    public $name = 'open-admin-quill';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';
    
}