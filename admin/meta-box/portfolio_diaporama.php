<?php

$cocorico = new Cocorico(false);
$cocorico->component('etendard-diaporama', 'portfolio_diaporama')->filter('diaporama-save');
$cocorico->render();