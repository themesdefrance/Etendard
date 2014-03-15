<?php

$cocorico = new Cocorico(false);
$cocorico->diaporama('portfolio_diaporama');
//$cocorico->component('etendard-diaporama', 'portfolio_diaporama')->filter('diaporama-save');
$cocorico->render();