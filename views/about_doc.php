<?php

require_once('/Applications/XAMPP/htdocs/educom-webshop-oop/views/basic_doc.php');

class AboutDoc extends BasicDoc
    {
    protected function showContent()
    {
    echo 
    '<h1>About</h1>
    <p>
    Ik ben Sofie, ik ben 32 jaar en ik heb een achtergrond in de antropologie en de journalistiek. 
    </p>

     <p>
     Ik woon in Arnhem, samen met mijn hond Dora.
     </p>

     <p>
     Mijn vriend woont in Amsterdam, dus ik ben ook geregeld daar te vinden. 
     </p>

     <p>
     Mijn hobbys zijn:
     <ul>
	<li>Gitaar spelen</li>
	<li>Fitness</li>
	<li>Netflix kijken</li>
	<li>Wandelen met mijn hond</li>
     </ul>
     </p>

     <p>
     Net als mijn moeder en mijn oma, denk ik vaak:
      <blockquote>
    <q><i>Zie het als een experiment, dan kan het niet mislukken.</i></q>
     </blockquote>
     </p>
    </p>';
    }
    }

?>