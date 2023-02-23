<?php
require('f_connexion.php');
if (!empty($_POST['name']) && !empty($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO user(name,email) VALUES(:name,:email)";
    $statement = $db->prepare($sql);
    if (
        $statement->execute([
            ':name' => $name,
            ':email' => $email
        ])
    ) {
        // $id = $db->lastInsertId();
        $message = " L'utilisateur <strong> $name </strong>est ajouté";
    }
    ;
   
}
; ?>
<?php require('header.php') ?>
<div class="container w-50 mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Creer utilisateur</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ;?>
            <div class="alert alert-success">
                <?php echo $message;?>
            </div>
            <?php endif;?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" >
                </div>
                <div class="form-group mt-4">
                    <input type="submit" value="Ajouter" class="btn btn-info">
                </div>

            </form>
        </div>
    </div>
</div>
<?php require('footer.php') ?>