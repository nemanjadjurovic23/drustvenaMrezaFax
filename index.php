<?php
    // ukljuci header.php
    // include "header.php"
    // include_once "header.php"
    // require "header.php"
    // require_once "header.php"
    require_once "header.php"
?>

            <div class="content">
 
            <p>
               <?php
                    echo "Welcome, $user!";
                    if (isset($id)) {
                        showProfile($id);
                    }

                ?>
            </p>
            </div>

    </div>
</body>

</html>