<?php

namespace UIT\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UITUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
