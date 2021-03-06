<?php
require_once dirname(__FILE__) .'/../../../sources/Afup/Bootstrap/Http.php';

setlocale(LC_TIME, 'fr_FR');

require_once 'Afup/AFUP_AppelConferencier.php';

$forum_appel = new AFUP_AppelConferencier($bdd);
$sessions = $forum_appel->obtenirListeSessionsPlannifies(3);

foreach ($sessions as $index => $session) {
    $sessions[$index]['conferenciers'] = $forum_appel->obtenirConferenciersPourSession($session['session_id']);
    $sessions[$index]['journees'] = explode(" ", $session['journee']);
}

$smarty->assign('sessions', $sessions);
$smarty->display('sessions.html');
?>
