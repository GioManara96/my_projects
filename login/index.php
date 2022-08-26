<?php include_once "header.php"; ?>

<div class="container-lg my-3 justify-content-center align-items-center">
    <?php
    if (isset($_SESSION["username"])) {
        echo "<div class='alert alert-info alert-dismissible fade show'>";
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
        echo "Welcome back " . $_SESSION["username"] . "!";
        echo "</div>";
    }
    ?>
    <div class="row p-3">
        <div class="col-lg-6 light-grey p-3 thick-border text-center">
            <p>Something important in here</p>
        </div>
        <div class="col-lg-3 light-grey p-3 thick-border text-center">
            <p>Something less important in here</p>
        </div>
        <div class="col-lg-3 light-grey p-3 thick-border text-center">
            <p>Something less important in here</p>
        </div>
    </div>
</div>


<?php include_once "footer.php"; ?>