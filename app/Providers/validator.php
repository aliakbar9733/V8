<?php

use Core\{App, Translation};
use Illuminate\{Container\Container, Validation\Factory};

App::instance()->validator = new Factory(Translation::getTranslator(), new Container);