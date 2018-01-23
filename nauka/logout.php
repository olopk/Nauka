
<div class="alert alert-success">Żegnaj admin</div>


<?php

    header("Location: http://localhost/nauka/index.php?strona=logowanie&alert=logout");

?>
<?php

    session_destroy();

?>
